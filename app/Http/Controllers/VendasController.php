<?php

namespace App\Http\Controllers;
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
        return Vendas::all();
    }

    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valor = $request->input();

        $vendas = new Vendas;
        $vendas->datta = $valor['datta'];
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
     * Show the form for editing the specified resource.
     */
    public function edit(Vendas $vendas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendas $vendas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendas $vendas)
    {
        //
    }
}
