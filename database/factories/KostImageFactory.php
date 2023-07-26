<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KostImage>
 */
class KostImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'KostBarb_WhatsAppImage2023-07-24at13.44.51.jpeg'
        ];
        return [
            'kost_id' => fake()->numberBetween(1,50),
            'image' => fake()->randomElement($images)
        ];
    }
}
