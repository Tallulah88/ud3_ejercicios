<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear la tabla 'asignaturas' solo si no existe
        if (!Schema::hasTable('asignaturas')) {
            Schema::create('asignaturas', function (Blueprint $table) {
                $table->id(); // Clave primaria
                $table->string('nombre'); // Nombre de la asignatura
                $table->string('descripcion')->nullable(); // Descripción de la asignatura, opcional
                $table->timestamps(); // created_at y updated_at
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaturas');
    }
};
