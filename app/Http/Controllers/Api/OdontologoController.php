<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Odontologo;

class OdontologoController extends Controller
{
    public function index()
    {
        return response()->json(Odontologo::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'nullable',
            'email' => 'required|email|unique:odontologos'
        ]);
        $odontologo = Odontologo::create($validated);
        return response()->json($odontologo, 201);
    }

    public function show($id)
    {
        $odontologo = Odontologo::find($id);
        if (!$odontologo) {
            return response()->json(['message' => 'Odontólogo no encontrado'], 404);
        }
        return response()->json($odontologo, 200);
    }

    public function update(Request $request, $id)
    {
        $odontologo = Odontologo::find($id);
        if (!$odontologo) {
            return response()->json(['message' => 'Odontólogo no encontrado'], 404);
        }
        $odontologo->update($request->all());
        return response()->json($odontologo, 200);
    }

    public function destroy($id)
    {
        $odontologo = Odontologo::find($id);
        if (!$odontologo) {
            return response()->json(['message' => 'Odontólogo no encontrado'], 404);
        }
        $odontologo->delete();
        return response()->json(['message' => 'Odontólogo eliminado'], 204);
    }
}
