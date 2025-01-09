<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    // GET /api/notas - Obtener todas las notas
    public function index()
    {
        return response()->json(Nota::all(), 200);
    }

    // GET /api/notas/{id} - Obtener una nota por su ID
    public function show($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        return response()->json($nota, 200);
    }

    // POST /api/notas - Crear una nueva nota
    public function store(Request $request)
    {
        $validated = $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'nota' => 'required|numeric|min:0|max:10',
        ]);

        $nota = Nota::create($validated);

        return response()->json($nota, 201);
    }

    // PUT /api/notas/{id} - Actualizar una nota existente
    public function update(Request $request, $id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        $validated = $request->validate([
            'alumno_id' => 'sometimes|exists:alumnos,id',
            'asignatura_id' => 'sometimes|exists:asignaturas,id',
            'nota' => 'sometimes|numeric|min:0|max:10',
        ]);

        $nota->update($validated);

        return response()->json($nota, 200);
    }

    // DELETE /api/notas/{id} - Eliminar una nota
    public function destroy($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        $nota->delete();

        return response()->json(['message' => 'Nota eliminada correctamente'], 200);
    }
}
