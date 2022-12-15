<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Usuarios = Usuario::all();

        return response()->json($Usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nome' => 'required|max:255|min:10',
            'email' => 'required',
            'senha' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Store - Your request is missing data'
            ], 400);
        }

        $Usuario = Usuario::create($request->all());

        return response()->json([
            'message' => 'Usuario created successfully',
            'Usuario' => $Usuario
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $Usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $Usuario)
    {
        return response()->json([
            'message' => 'success',
            'Usuario' => $Usuario
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $Usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $Usuario)
    {
        $validated = Validator::make($request->all(), [
            'nome' => 'max:255'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Your request is missing data'
            ], 400);
        }

        $Usuario->update($request->all());

        return response()->json([
            'message' => 'Usuario updated successfully',
            'Usuario' => $Usuario
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $Usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $Usuario)
    {
        $Usuario->delete();

        return response()->json([
            'message' => "Usuario deleted successfully"
        ], 200);
    }
}

