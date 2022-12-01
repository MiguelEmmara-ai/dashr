<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $title = '';

        // if (request('category')) {
        //     $category = Category::firstWhere('slug', request('category'));
        //     $title = ' In ' . $category->name;
        // }

        // if (request('author')) {
        //     $author = User::firstWhere('username', request('author'));
        //     $title = ' By ' . $author->name;
        // }


        // return view('posts', [
        //     "title" => "All Post " . $title,
        //     "active" => "posts",
        //     "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
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

    public function showAllPosts()
    {
        return view('pages.admin.posts', [
            "title" => "Admin Dashboard",
            "posts" => Post::latest()->paginate(7)->withQueryString(),
            "user" => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
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
        $post->delete();

        return redirect()->route('dashboard-posts')->with('success', 'Success Delete Post');
    }

    public function randomArticle(Post $post)
    {
        $post = Post::all();
        $random_id = $post->random()->id;
        $slug = Post::select('slug')->where('id', $random_id)->get()->value('slug');

        return redirect("/post/$slug");
    }

    public static function nextPost($id)
    {
        // get the current user
        $post = Post::find($id);

        // get next post id
        $next = Post::where('id', '>', $post->id)->min('id');
        $slug = Post::select('slug')->where('id', $next)->get()->value('slug');

        return ("/post/$slug");
    }

    public static function prevPost($id)
    {
        // get the current user
        $post = Post::find($id);

        // get previous user id
        $previous = Post::where('id', '<', $post->id)->max('id');
        $slug = Post::select('slug')->where('id', $previous)->get()->value('slug');

        return ("/post/$slug");
    }
}
