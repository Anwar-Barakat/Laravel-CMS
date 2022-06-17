<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'          => 'AN BLOG',
            'location'      => 'Damascus Syria',
            'mobile'        => '012301230123',
            'bio'           => $this->faker->paragraph(),
            'facebook'      => 'https://www.facebook.com/AnwarBarakat97',
            'telegram'      => 'https://t.me/brkatanwar',
            'email'         => 'barakatanwar0@gmail.com',
            'github'        => 'https://github.com/Anwar-Barakat',
            'copyright'     => 'Copyright © 2022 AN. All rights reserved',
        ];
    }
}