<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    // GET /api/asignaturas - Obtener todas las asignaturas
    public function index()
    {
        return response()->json(Asignatura::all(), 200);
    }

    // GET /api/asignaturas/{id} - Obtener una asignatura por su ID
    public function show($id)
    {
        $asignatura = Asignatura::find($id);

        if (!$asignatura) {
            return response()->json(['message' => 'Asignatura no encontrada'], 404);
        }

        return response()->json($asignatura, 200);
    }

    // POST /api/asignaturas - Crear una nueva asignatura
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        $asignatura = Asignatura::create($validated);

        return response()->json($asignatura, 201);
    }

    // PUT /api/asignaturas/{id} - Actualizar una asignatura existente
    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::find($id);

        if (!$asignatura) {
            return response()->json(['message' => 'Asignatura no encontrada'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|nullable|string|max:1000',
        ]);

        $asignatura->update($validated);

        return response()->json($asignatura, 200);
    }

    // DELETE /api/asignaturas/{id} - Eliminar una asignatura
    public function destroy($id)
    {
        $asignatura = Asignatura::find($id);

        if (!$asignatura) {
            return response()->json(['message' => 'Asignatura no encontrada'], 404);
        }

        $asignatura->delete();

        return response()->json(['message' => 'Asignatura eliminada correctamente'], 200);
    }
}
