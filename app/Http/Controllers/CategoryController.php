<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralSetting;
use App\Models\Post;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general_setting = GeneralSetting::first();

        return view('pages.admin.categories', [
            'site_title' => $general_setting->site_title,
            'title' => 'Categories List',
            'tagline' => $general_setting->site_tagline,
            'logo_image' => $general_setting->logo_image,
            'footer_copyright' => $general_setting->footer_copyright,
            'categories' => Category::latest()->paginate(8)->withQueryString(),
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $general_setting = GeneralSetting::first();

        return view('pages.admin.create-categories', [
            'site_title' => $general_setting->site_title,
            "title" => "Create Category",
            "tagline" => $general_setting->site_tagline,
            "logo_image" => $general_setting->logo_image,
            "footer_copyright" => $general_setting->footer_copyright,
            "categories" => Category::all(),
            "user" => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:categories'],
            'slug' => ['required', 'unique:categories'],
        ]);

        $data = $request->all();
        Category::create($data);

        return Redirect::route('admin-categories.index')->with('success', "Success Create Category [$request->name]");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return Redirect::route('admin-categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $general_setting = GeneralSetting::first();
        $category = Category::findOrFail($id);

        return view('pages.admin.edit-categories')->with([
            'site_title' => $general_setting->site_title,
            "title" => "Edit | $category->name",
            "tagline" => $general_setting->site_tagline,
            "logo_image" => $general_setting->logo_image,
            "footer_copyright" => $general_setting->footer_copyright,
            "category" => $category,
            "categories" => Category::all(),
            "user" => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
        ]);

        $data = $request->all();

        $category = Category::findOrFail($id);

        // Check if the slug has been change
        if ($request->slug != $category->slug) {
            $data['slug'] = $request->slug;
        }

        $category->update($data);

        return Redirect::route('admin-categories.index')->with('success', "Success Update Category [$request->name]");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::findOrFail($id);

        // Prevent user to delete 'uncategorized' category
        if ($id == 1) {
            return Redirect::route('admin-categories.index')->with('error', 'Cannot Delete Uncategorized');
        }

        $category->delete();

        // Also detach that category from the posts, not delete, 1 means 'uncategorized' category
        Post::where('category_id', $id)
            ->update(['category_id' => 1]);

        return Redirect::route('admin-categories.index')->with('success', 'Success Delete Category');
    }

    public function checkCategorySlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
