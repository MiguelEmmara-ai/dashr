<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravolt\Avatar\Facade as Avatar;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Generate default avatar for dummy users
        // Start from 2, because in dbseeder, we init the first user (admin)
        static $id = 2;
        $fake_name = fake()->name();
        Avatar::create($fake_name)->save(storage_path('app/public/default_avatar-' . $id . '.jpg'), 100);

        return [
            'name' => $fake_name,
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'haveAvatar' => false,
            'default_avatar' => 'storage/default_avatar-' . $id++ . '.jpg',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // 'password'
            'remember_token' => Str::random(10),
            'user_types' => 'bloggers',
            'user_status' => 'ACTIVE',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
