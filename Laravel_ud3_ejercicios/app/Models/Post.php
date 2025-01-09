<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'alumno_id',
        'titulo',
        'contenido',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
