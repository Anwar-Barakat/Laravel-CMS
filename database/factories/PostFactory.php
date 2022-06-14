<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories     = collect(Category::all()->modelKeys());
        $users          = collect(User::all()->modelKeys());

        $days       = [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
            '21', '22', '23', '24', '25', '26', '27', '28'
        ];
        $months     = [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
            '11', '12'
        ];
        $post_date  = "2021-" . Arr::random($months) . "-" . Arr::random($days) . " 03:04:17";
        $post_title = $this->faker->sentence(mt_rand(3, 6), true);

        return [
            'title'                 => $post_title,
            'slug'                  => Str::slug($this->faker->sentence()),
            'description'           => $this->faker->text(300),
            'category_id'           => $categories->random(),
            'user_id'               => $users->random(),
            'created_at'            => $post_date,
            'updated_at'            => $post_date,
        ];
    }
}