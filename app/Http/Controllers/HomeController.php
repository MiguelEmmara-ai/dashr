<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralSetting;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;

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

        SEOTools::setTitle("$general_setting->site_title | $general_setting->site_tagline");
        SEOTools::setDescription("$general_setting->site_meta_description");
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'webiste');

        return view('pages.home', [
            'site_title' => $general_setting->site_title,
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

        SEOTools::setTitle("Categories | $general_setting->site_tagline");
        SEOTools::setDescription("$general_setting->site_meta_description");
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'webiste');

        return view('pages.categories', [
            'site_title' => $general_setting->site_title,
            'logo_image' => $general_setting->logo_image,
            'footer_copyright' => $general_setting->footer_copyright,
            'categories' => $categories
        ]);
    }
}
