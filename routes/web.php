<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/categories', [HomeController::class, 'showCategories'])
    ->name('show-categories');

Route::get('/about', function () {
    $general_setting = GeneralSetting::first();

    return view('pages.about', [
        'site_title' => $general_setting->site_title,
        'title' => 'About Us',
        'tagline' => $general_setting->site_tagline,
        'logo_image' => $general_setting->logo_image,
        'footer_copyright' => $general_setting->footer_copyright,
    ]);
})->name('about');

Route::get('/contact', function () {
    $general_setting = GeneralSetting::first();

    return view('pages.contact', [
        'site_title' => $general_setting->site_title,
        'title' => 'Contact Us',
        'tagline' => $general_setting->site_tagline,
        'logo_image' => $general_setting->logo_image,
        'footer_copyright' => $general_setting->footer_copyright,
    ]);
})->name('contact');

Route::get('/random-post', [PostController::class, 'randomArticle']);

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('posts/checkSlug', [PostController::class, 'checkSlug'])
        ->name('checkSlug');
    Route::resource('posts', PostController::class);

    Route::resource('admin-categories', CategoryController::class);

    Route::get('categories/checkCategorySlug', [CategoryController::class, 'checkCategorySlug'])
        ->name('checkCategorySlug');
    Route::resource('general-settings', GeneralSettingController::class);
});

require __DIR__ . '/auth.php';

Route::get('/{post:slug}', [PostController::class, 'show']);
