<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravolt\Avatar\Facade as Avatar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'name' => 'Miguel Emmara',
            'username' => 'miguelemmara',
            'email' => 'miguelemmara123@gmail.com',
            'haveAvatar' => false,
            'default_avatar' => 'storage/default_avatar-1.jpg',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
        ]);

        Avatar::create('Miguel Emmara')->save(storage_path('app/public/default_avatar-1.jpg'), 100);

        User::factory(9)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(30)->create();
    }
}
