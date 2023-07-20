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
        $types = [['L'],['P'], ['L', 'P']];
        return [
            // "id"=> "kost001",
            "name"=> fake()->name(),
            "type"=> fake()->randomElement($types),
            "images"=> [
                'https://images.unsplash.com/photo-1520342868574-5fa3804e551c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6ff92caffcdd63681a35134a6770ed3b&auto=format&fit=crop&w=1951&q=80',
                'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
                'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94a1e718d89ca60a6337a6008341ca50&auto=format&fit=crop&w=1950&q=80',
                'https://images.unsplash.com/photo-1523205771623-e0faa4d2813d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=89719a0d55dd05e2deae4120227e6efc&auto=format&fit=crop&w=1953&q=80',
                'https://images.unsplash.com/photo-1508704019882-f9cf40e475b4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8c6e5e3aba713b17aa1fe71ab4f0ae5b&auto=format&fit=crop&w=1352&q=80',
                'https://images.unsplash.com/photo-1519985176271-adb1088fa94c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0c8d632e977f94e5d312d9893258f59&auto=format&fit=crop&w=1355&q=80'
            ],
            "region"=> fake()->randomElement(['Purwokerto','Purbalingga','Sokaraja']),
            "address" => fake()->address(),
            "facilities"=> [
                "Kamar Tipe 1 : Kamar Mandi dalam, Free Wifi, Karoke, AC, Free Air, (10 Jt/bln)",
                "Kamar Tipe 2 : Kamar Mandi dalam, Free Wifi, Karoke, AC, Free Air, Lapangan golf, Sarapan, Free listrik (16 Jt/bln)",
                "AC",
                "Kamar Mandi dalam",
                "Lapangan Tenis",
                "Security",
                "Music 24 Jam"
            ],
            "location"=> fake()->randomElement([null,'https://goo.gl/maps/R6NaDdHGNfaLwp4cA']) ,
            "price_start_month"=> fake()->randomElement([null,fake()->numberBetween(100000,400000)]),
            "price_start_year"=> fake()->randomElement([null,fake()->numberBetween(1000000,4000000)]),
            "owner"=> fake()->phoneNumber()
        ];
    }
}
