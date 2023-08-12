<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => "Fakultas ".fake()->sentence(),
            'alias' => "Fa".fake()->sentence(3),
            'location' => fake()->randomElement([null,'https://goo.gl/maps/R6NaDdHGNfaLwp4cA']) ,
            'image' => fake()->randomElement([null,"https://images.unsplash.com/photo-1691064057997-ffe2483ab125?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=827&q=80"]),
            'description' => fake()->paragraph(3),
            'instagram_link' => fake()->randomElement([null, "https://google.com"]),
            'youtube_link' => fake()->randomElement([null, "https://google.com"]),
            'line_link' => fake()->randomElement([null, "https://google.com"]),
            'twitter_link' => fake()->randomElement([null, "https://google.com"]),
            'spotify_link' => fake()->randomElement([null, "https://google.com"]),
            'tiktok_link' => fake()->randomElement([null, "https://google.com"]),
            'website_link' => fake()->randomElement([null, "https://google.com"])
        ];
    }
}
