<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Init Paginator
        Paginator::useBootstrap();

        // Authorize if user is the owner of the post or user_types is 'Admin'
        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->user_types === 'Admin'
                ? Response::allow()
                : Response::deny('You must be the owner of the post to edit.');
        });

        // Authorize if user types is 'Admin'
        Gate::define('Admin', function (User $user) {
            return $user->user_types === 'Admin';
        });
    }
}
