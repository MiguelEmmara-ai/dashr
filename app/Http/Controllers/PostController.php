<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.posts', [
            "title" => "Admin Dashboard",
            "posts" => Post::latest()->paginate(10)->withQueryString()->sortbydesc('id'),
            "user" => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.create-posts', [
            "title" => "Admin Dashboard",
            "categories" => Category::all(),
            "user" => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('post-images');
        }

        Post::create($data);

        return Redirect::route('posts.index')->with('success', "Success Create Post [$request->title]");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('pages.post', [
            "title" => "Post",
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('pages.admin.edit-post')->with([
            "post" => $post,
            "categories" => Category::all(),
            "user" => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->all();

        $post = Post::findOrFail($id);

        // Check if the slug has been change
        if ($request->slug != $post->slug) {
            $data['slug'] = 'required|unique:posts';
        }

        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->file('image')) {
            if ($post->image) {
                FacadesStorage::delete($post->image);
            }
            $data['image'] = $request->file('image')->store('post-images');
        }

        $post->update($data);

        return Redirect::route('posts.index')->with('success', "Success Update Post [$request->title]");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            FacadesStorage::delete($post->image);
        }

        $post->delete();

        return Redirect::route('posts.index')->with('success', 'Success Delete Post');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    public function randomArticle(Post $post)
    {
        $post = Post::all();
        $random_id = $post->random()->id;
        $slug = Post::select('slug')->where('id', $random_id)->get()->value('slug');

        return redirect("/$slug");
    }

    public static function nextPost($id)
    {
        // get the current post id
        $post_id = Post::find($id);

        // get the next post id
        $next_id = Post::where('id', '>', $post_id->id)->min('id');

        $slug = Post::select('slug')->where('id', $next_id)->get()->value('slug');

        // get the max post id
        $max_id = Post::where('id', $post_id->id)->max('id') + 1;

        if ($post_id->id == $max_id) {
            return ("/");
        }

        return ("/$slug");
    }

    public static function prevPost($id)
    {
        // get the current post id
        $post_id = Post::find($id);

        // get the previous post id
        $previous_id = Post::where('id', '<', $post_id->id)->max('id');
        $slug = Post::select('slug')->where('id', $previous_id)->get()->value('slug');

        if ($post_id->id == "1") {
            return ("/");
        }

        return ("/$slug");
    }
}
