<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assinatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssinaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Assinaturas = Assinatura::all();

        return response()->json($Assinaturas);
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
            'nome' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Your request is missing data'
            ], 400);
        }

        $Assinatura = Assinatura::create($request->all());

        return response()->json([
            'message' => 'Assinatura created successfully',
            'Assinatura' => $Assinatura
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assinatura  $Assinatura
     * @return \Illuminate\Http\Response
     */
    public function show(Assinatura $Assinatura)
    {
        return response()->json([
            'message' => 'success',
            'Assinatura' => $Assinatura
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assinatura  $Assinatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assinatura $Assinatura)
    {
        $validated = Validator::make($request->all(), [
            'nome' => 'max:255'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Your request is missing data'
            ], 400);
        }

        $Assinatura->update($request->all());

        return response()->json([
            'message' => 'Assinatura updated successfully',
            'Assinatura' => $Assinatura
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assinatura  $Assinatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assinatura $Assinatura)
    {
        $Assinatura->delete();

        return response()->json([
            'message' => "Assinatura deleted successfully"
        ], 200);
    }
}

