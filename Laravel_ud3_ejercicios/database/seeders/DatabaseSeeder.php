<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar a los seeders de la base de datos
        $this->call([
            AlumnosTableSeeder::class,
            AsignaturasTableSeeder::class,
            NotasTableSeeder::class,
        ]);
    }
}
