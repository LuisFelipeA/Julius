<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movimentacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimentacoes = Movimentacao::all();

        return response()-> json($movimentacoes);
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
            'valor' => 'required',
            'descricao' => 'required',
            'recorrente' => 'required',
            'users_id' => 'required',
            'tipo_movimentacoes_id' => 'required'
        ]);

        if ($request->tipo_movimentacoes_id == 2 or $request->tipo_movimentacoes_id == 4) {
            $newValue = ($request->valor)*-1;
            $request->merge(['valor' => $newValue]);
        }

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Your request is missing data'
            ], 400);
        }

        $movimentacao = Movimentacao::create($request->all());

        return response()->json([
            'message' => 'Movimentacao created successfully',
            'Movimentacao' => $movimentacao
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movimentacao $movimentacao)
    {
        return response()->json ([
            'message' => 'success',
            'Movimentacao' => $movimentacao
        ], 200);
    }

    public function update(Request $request, Movimentacao $movimentacao)
    {
        $validated = Validator::make($request->all(), [
            'nome' => 'max:255'
        ]);
        
        if ($request->tipo_movimentacoes_id == 2 or $request->tipo_movimentacoes_id == 4) {
            $newValue = ($request->valor)*-1;
            $request->merge(['valor' => $newValue]);
        }

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Your request is missing data'
            ], 400);
        }

        $movimentacao->update($request->all());

        

        return response()->json([
            'message' => 'User updated successfully',
            'Movimentação' => $movimentacao
        ], 200);
    }

    public function destroy(Movimentacao $movimentacao)
    {

        $movimentacao->delete();

        return response()->json([
            'message' => 'Movimentacao deleted successfully'
        ], 200);
    }
}


