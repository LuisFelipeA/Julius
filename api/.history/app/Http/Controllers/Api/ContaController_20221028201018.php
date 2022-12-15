<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Contas = Conta::all();

        return response()->json($Contas);
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
            'saldo' => 'required',
            'usuarios_id' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Your request is missing data'
            ], 400);
        }

        $Conta = Conta::create($request->all());

        return response()->json([
            'message' => 'Conta created successfully',
            'Conta' => $Conta
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conta  $Conta
     * @return \Illuminate\Http\Response
     */
    public function show(Conta $Conta)
    {
        return response()->json([
            'message' => 'success',
            'Conta' => $Conta
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conta  $Conta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conta $Conta)
    {
        $validated = Validator::make($request->all(), [

        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Your request is missing data'
            ], 400);
        }

        $Conta->update($request->all());

        return response()->json([
            'message' => 'Conta updated successfully',
            'Conta' => $Conta
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conta  $Conta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conta $Conta)
    {
        $Conta->delete();

        return response()->json([
            'message' => "Conta deleted successfully"
        ], 200);
    }
}

