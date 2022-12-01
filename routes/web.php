<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/about', function () {
    return view('pages.about', [
        "title" => "About Us",
    ]);
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact', [
        "title" => "Contact Us",
    ]);
})->name('contact');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

Route::get('/post/{post:slug}', [PostController::class, 'show']);
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

    Route::get('/dashboard/all-posts', [PostController::class, 'showAllPosts'])
        ->name('dashboard-posts');
    Route::get('/dashboard/all-posts/checkSlug', [PostController::class, 'checkSlug'])
        ->name('checkSlug');
    Route::resource('/dashboard/posts', PostController::class);
});

require __DIR__ . '/auth.php';
