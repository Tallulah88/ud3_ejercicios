<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notas')->insert([
            [
                'alumno_id' => 1, // Relaciona con Juan Pérez
                'asignatura_id' => 1, // Relaciona con Matemáticas
                'nota' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'alumno_id' => 2, // Relaciona con María González
                'asignatura_id' => 2, // Relaciona con Historia
                'nota' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'alumno_id' => 3, // Relaciona con Carlos López
                'asignatura_id' => 3, // Relaciona con Física
                'nota' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
