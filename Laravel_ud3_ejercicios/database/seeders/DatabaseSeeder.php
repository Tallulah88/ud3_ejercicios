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
        // Llamar al seeder AlumnosTableSeeder
        $this->call(AlumnosTableSeeder::class);

        // Si deseas mantener el usuario de prueba, puedes descomentarlo o eliminarlo según sea necesario.
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
