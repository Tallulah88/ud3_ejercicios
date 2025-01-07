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
        // Crear la tabla 'alumnos'
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id(); // Columna id (clave primaria)
            $table->string('nombre'); // Columna para el nombre
            $table->string('email')->unique(); // Columna para el email (único)
            $table->timestamps(); // Columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la tabla 'alumnos' si existe
        Schema::dropIfExists('alumnos');
    }
};
