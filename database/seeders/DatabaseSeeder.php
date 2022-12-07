<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\GeneralSetting;
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
            'name' => 'super admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'haveAvatar' => false,
            'default_avatar' => 'storage/default_avatar-1.jpg',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'user_types' => 'admin',
            'user_status' => 'ACTIVE',
        ]);

        Avatar::create('Miguel Emmara')->save(storage_path('app/public/default_avatar-1.jpg'), 100);

        // Generate additional 4 authors (total 5)
        User::factory(4)->create();

        // Generate default Uncategorized category
        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized'
        ]);

        // Generat 10 random post
        Post::factory(10)->create();

        // Generate default GeneralSetting
        GeneralSetting::factory(1)->create();

        // Generate additional 4 authors (total 5)
        Category::factory(4)->create();
    }
}
