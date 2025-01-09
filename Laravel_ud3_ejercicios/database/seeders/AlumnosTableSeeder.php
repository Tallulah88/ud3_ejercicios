<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AlumnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar alumnos
        $alumnos = [
            [
                'nombre' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'María González',
                'email' => 'maria.gonzalez@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Carlos López',
                'email' => 'carlos.lopez@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('alumnos')->insert($alumnos);

        // Obtener IDs de los alumnos recién creados
        $alumnosIds = DB::table('alumnos')->pluck('id');

        // Insertar perfiles para cada alumno
        foreach ($alumnosIds as $id) {
            DB::table('perfils')->insert([
                'alumno_id' => $id,
                'biografia' => 'Biografía del alumno con ID ' . $id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Insertar asignaturas
        $asignaturas = [
            [
                'nombre' => 'Matemáticas',
                'descripcion' => 'Cálculo y álgebra básica',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Historia',
                'descripcion' => 'Historia mundial y civilizaciones',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Física',
                'descripcion' => 'Física básica y avanzada',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('asignaturas')->insert($asignaturas);

        // Obtener IDs de las asignaturas recién creadas
        $asignaturasIds = DB::table('asignaturas')->pluck('id');

        // Insertar notas para cada alumno en cada asignatura
        foreach ($alumnosIds as $alumnoId) {
            foreach ($asignaturasIds as $asignaturaId) {
                DB::table('notas')->insert([
                    'alumno_id' => $alumnoId,
                    'asignatura_id' => $asignaturaId,
                    'nota' => rand(5, 10), // Nota aleatoria entre 5 y 10
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // Insertar posts para cada alumno
        foreach ($alumnosIds as $id) {
            DB::table('posts')->insert([
                [
                    'alumno_id' => $id,
                    'titulo' => 'Mi primer post',
                    'contenido' => 'Contenido del primer post del alumno con ID ' . $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'alumno_id' => $id,
                    'titulo' => 'Mi segundo post',
                    'contenido' => 'Contenido del segundo post del alumno con ID ' . $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
}
