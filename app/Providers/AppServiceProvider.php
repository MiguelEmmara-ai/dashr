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
        Paginator::useBootstrap();

        // Authorize if user is the owner of the post or user_types is 'admin'
        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->user_types === 'admin'
                ? Response::allow()
                : Response::deny('You must be the owner of the post to edit.');
        });

        // Authorize if user types is 'admin'
        Gate::define('admin', function (User $user) {
            return $user->user_types === 'admin';
        });
    }
}
