<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GensoedMerchandiseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image' => fake()->randomElement([
                null,
                "https://images.unsplash.com/photo-1464965978620-04194189e9a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
                "https://images.unsplash.com/photo-1565206594704-0ee96fe6b62a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80"
            ],
        ),
        'price_start' => fake()->numberBetween(10000,500000),
        'price_end' => fake()->randomElement([
            null,
            fake()->numberBetween(30000,600000)
        ]),
        'product_link' => fake()->randomElement([
            "https://shopee.co.id/SANDAL-JAPIT-MASAKINI-FLG-i.76252588.8299500145?sp_atk=b1f25061-5344-4978-964d-47645f8b6f4d&xptdk=b1f25061-5344-4978-964d-47645f8b6f4d",
            "https://shopee.co.id/COLLAR-FKCDONINA-SWEATER-98-CREWNECK-UNISEX-SWEATSHIRT-OVERSIZE-i.3442020.20466835601?sp_atk=e72640d5-f73d-4bbd-af02-7a470d25b17e&xptdk=e72640d5-f73d-4bbd-af02-7a470d25b17e"
        ])
        ];
    }
}
