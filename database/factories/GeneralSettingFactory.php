<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeneralSetting>
 */
class GeneralSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'site_title' => 'Dashr',
            'site_tagline' => 'Laravel Blog CMS',
            'site_meta_tags' => 'laravel, cms, blog, news, wordpress',
            'site_meta_description' => 'This is example site meta description',
            'logo_image' => 'https://cdn-icons-png.flaticon.com/512/2369/2369321.png',
            'footer_Copyright' => 'All right reserved by',
        ];
    }
}
