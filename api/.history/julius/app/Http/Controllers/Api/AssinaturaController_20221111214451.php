
<?php

namespace julius/app\Http\Controllers\Api;

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
        $assinaturas = Assinatura::all();

        return response()->json($assinaturas);
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
            'users_id' => 'required',
            'nome' => 'required',
            'valor' => 'required',
            'descricao' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Your request is missing data'
            ], 400);
        }

        $assinatura = Assinatura::create($request->all());

        return response()->json([
            'message' => 'Assinatura created successfully',
            'Assinatura' => $assinatura
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assinatura  $Assinatura
     * @return \Illuminate\Http\Response
     */
    public function show(Assinatura $assinatura)
    {
        return response()->json([
            'message' => 'success',
            'Assinatura' => $assinatura
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assinatura  $Assinatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assinatura $assinatura)
    {
        $validated = Validator::make($request->all(), [
            'nome' => 'max:255',
            'valor',
            'descricao'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Your request is missing data'
            ], 400);
        }

        $assinatura->update($request->all());

        return response()->json([
            'message' => 'Assinatura updated successfully',
            'Assinatura' => $assinatura
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assinatura  $Assinatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assinatura $assinatura)
    {
        $assinatura->delete();

        return response()->json([
            'message' => "Assinatura deleted successfully"
        ], 200);
    }
}

