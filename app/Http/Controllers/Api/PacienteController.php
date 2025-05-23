<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller

{
    // Listar todos los pacientes
    public function index()
    {
        return response()->json(Paciente::all(), 200);
    }

    // Crear un paciente nuevo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'nullable|string',
            'email' => 'required|email|unique:pacientes,email',
            'fecha_nacimiento' => 'required|date',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $paciente = Paciente::create($validated);

        return response()->json($paciente, 201);
    }

    // Mostrar paciente por ID
    public function show($id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }
        return response()->json($paciente, 200);
    }

    // Actualizar paciente por ID
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string',
            'apellido' => 'sometimes|required|string',
            'telefono' => 'nullable|string',
            'email' => "sometimes|required|email|unique:pacientes,email,$id",
            'fecha_nacimiento' => 'sometimes|required|date',
            'password' => 'sometimes|required|string|min:6',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $paciente->update($validated);

        return response()->json($paciente, 200);
    }

    // Eliminar paciente por ID
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }

        $paciente->delete();

        return response()->json(null, 204);
    }
}
