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
        return Compras::all();
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
        try{
            $veiculo->save();
            $puxaID = DB::select('select max(id_veiculo) from concessionaria.veiculo');

            $compra = new Compras;
            $compra->valor = $valor["valor"];
            $compra->id_funcionario = $valor["id_funcionario"];
            $compra->id_veiculo = $puxaID;
            $compra->id_fornecedor = $valor["id_fornecedor"];

            $compra->save();

        }catch(\Exception $e){
            $puxaID = DB::select('select max(id_veiculo) from concessionaria.veiculo')[0]->{"max(id_veiculo)"};

            $result = Veiculo::destroy($puxaID);

            return [
                "status" => "ERROR",
                "message" => $e->getMessage(),
                "remove_vehicle" => $result
            ];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $result = Compras::find($id);

        if($result) return $result;

        return [];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $result = Compras::destroy($id);

        return $result;
    }
}
