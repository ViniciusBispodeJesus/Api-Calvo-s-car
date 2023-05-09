<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Compras;
use Illuminate\Http\Request;
use App\Models\Veiculo;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valor = $request->input();

        $veiculo = new Veiculo;

        $veiculo->ano_fabricacao = $valor['ano'];
        $veiculo->chassi = $valor['chassi'];
        $veiculo->statuss = $valor['statuss'];
        $veiculo->vendido = $valor['vendido'];
        $veiculo->placa = $valor['placa'];
        $veiculo->cor = $valor['cor'];
        $veiculo->id_modelo = $valor['id_modelo'];
        $veiculo->id_cliente = $valor['id_cliente'];
        if($veiculo->save()){
            $puxaID = DB::statement('select max(id_veiculo) from concessionaria.veiculo');
            $compra = new Compras;
            $compra->valor = $valor["valor"];
            $compra->id_funcionario = $valor["id_funcionario"];
            $compra->id_veiculo = $puxaID;
            $compra->id_fornecedor = $valor["id_fornecedor"];
        }
        try{
            $compra->save();

        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Compras $compras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compras $compras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compras $compras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compras $compras)
    {
        //
    }
}
