<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\GeneralSetting;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // General Setting of the website
        $general_setting = GeneralSetting::first();

        SEOTools::setTitle("Categories List | Dashboard");
        SEOTools::setDescription("$general_setting->site_meta_description");
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'webiste');

        return view('pages.admin.categories', [
            'site_title' => $general_setting->site_title,
            'logo_image' => $general_setting->logo_image,
            'footer_copyright' => $general_setting->footer_copyright,
            'categories' => Category::latest()->paginate(10)->withQueryString(),
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
        // General Setting of the website
        $general_setting = GeneralSetting::first();

        SEOTools::setTitle("Create Category | Dashboard");
        SEOTools::setDescription("$general_setting->site_meta_description");
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'webiste');

        return view('pages.admin.create-categories', [
            'site_title' => $general_setting->site_title,
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
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        // Save image file to storage/category-images
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('category-images');
        }

        Category::create($data);

        return Redirect::route('admin-categories.index')->with('success', "Success Create Category [$request->name]");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        /**
         * Since we are now displaying single category,
         * We return /admin-categories when user tries to access
         * /admin-categories/{id}
         *
         */
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
        // General Setting of the website
        $general_setting = GeneralSetting::first();
        $category = Category::findOrFail($id);

        SEOTools::setTitle("Edit | Dashboard");
        SEOTools::setDescription("$general_setting->site_meta_description");
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'webiste');

        return view('pages.admin.edit-categories')->with([
            'site_title' => $general_setting->site_title,
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
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->all();

        $category = Category::findOrFail($id);

        // Check if the slug has been change
        if ($request->slug != $category->slug) {
            $data['slug'] = $request->slug;
        }

        // Save image file to storage/category-images
        if ($request->file('image')) {
            // Will delete existing image before storing new images
            if ($category->image) {
                FacadesStorage::delete($category->image);
            }
            $data['image'] = $request->file('image')->store('category-images');
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

        // Also delete that post image
        if ($category->image) {
            FacadesStorage::delete($category->image);
        }

        // Delete category record
        $category->delete();

        // Also detach that category from the posts, not delete, 1 means 'uncategorized' category
        Post::where('category_id', $id)
            ->update(['category_id' => 1]);

        return Redirect::route('admin-categories.index')->with('success', 'Success Delete Category');
    }

    /**
     * Check if the category slug already exist in the records
     *
     * @param  \Illuminate\Http\Request  $request
     * @return json
     */
    public function checkCategorySlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
