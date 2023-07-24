<?php

namespace Database\Factories;

use App\Models\Kost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kost>
 */
class KostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['L','P','campur'];
        return [
            // "id"=> "kost001",
            "name"=> fake()->name(),
            "type"=> fake()->randomElement($types),
            "region"=> fake()->randomElement(['Purwokerto','Purbalingga','Sokaraja']),
            "address" => fake()->address(),
            "location"=> fake()->randomElement([null,'https://goo.gl/maps/R6NaDdHGNfaLwp4cA']) ,
            "price_start" =>fake()->numberBetween(1000000,3000000),
            "owner"=> fake()->phoneNumber()
        ];
    }
}
