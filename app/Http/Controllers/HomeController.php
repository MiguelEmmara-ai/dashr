<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralSetting;
use App\Models\Post;

class HomeController extends Controller
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

        return view('pages.home', [
            'site_title' => $general_setting->site_title,
            'title' => $general_setting->site_title,
            'tagline' => $general_setting->site_tagline,
            'logo_image' => $general_setting->logo_image,
            'footer_copyright' => $general_setting->footer_copyright,
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(8)->withQueryString()
        ]);
    }

    public function showCategories()
    {
        // General Setting of the website
        $general_setting = GeneralSetting::first();
        $categories = Category::with('posts')->get();

        return view('pages.categories', [
            'site_title' => $general_setting->site_title,
            'title' => 'Categories',
            'tagline' => $general_setting->site_tagline,
            'logo_image' => $general_setting->logo_image,
            'footer_copyright' => $general_setting->footer_copyright,
            'categories' => $categories
        ]);
    }
}
