<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'alumnos';

    // Campos asignables en la base de datos
    protected $fillable = [
        'nombre',
        'email',
    ];

    // Relaciones (opcional, para futuros ejercicios)
    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
