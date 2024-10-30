<?php

namespace Database\Seeders;

use App\Models\Laboratorio;
use App\Models\LineaFarmaceutica;
use App\Models\Producto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            ]
        );

        User::factory()->create([
            'name' => 'Alexis',
            'email' => 'jhonalexispb@gmail.com',
            'password' => '12345678',
            ]
        );

        Producto::factory(50)->create();
        Laboratorio::factory(10)->create();
        LineaFarmaceutica::factory(5)->create();
    }
}
