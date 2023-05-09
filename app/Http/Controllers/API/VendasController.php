<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Veiculo;
use App\Models\Vendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Vendas::orderBy('id_venda')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valor = $request->input();

        $vendas = new Vendas;
        $vendas->datta = $valor['data'];
        $vendas->id_funcionario = $valor['id_funcionario'];
        $vendas->id_veiculo = $valor['id_veiculo'];
        $vendas->id_pagamento = $valor['id_pagamento'];
        $vendas->id_cliente = $valor['id_cliente'];

        try{
            $vendas->save();
            DB::statement('UPDATE concessionaria.veiculo SET vendido = true WHERE ' . $vendas->id_veiculo . ' = id_veiculo');

        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }
        
        return $valor;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $result = Vendas::find($id);

        if($result) return $result;

        return [];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return Vendas::destroy($id);
    }
}
