<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $general_setting = GeneralSetting::first();
        $categories = Category::all();

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
