<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Medkom 2023',
            'email' => 'medkominfo22@gmail.com',
            'password' => 'medkom2023',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'ayaya',
            'email' => 'ayaya@gmail.com',
            'password' => 'ayaya2809',
        ]);
        \App\Models\Faculty::factory(18)->create();
        // \App\Models\Kost::factory(50)->create();
        // \App\Models\KostFacility::factory(150)->create();
        // \App\Models\KostImage::factory(100)->create();
    }
}
