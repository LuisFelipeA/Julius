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
            'data' => 'required',
            'data_venc',
            'descricao' => 'required',
            'frequencia',
            'recorrente' => 'required',
            'usuario_id' => 'required',
            'tipo_movimentacoes_id' => 'required'
        ]);

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimentacao $movimentacao)
    {
        return response()->json([
            'message' => 'Movimentacao deleted successfully'
        ], 200);
    }
}
