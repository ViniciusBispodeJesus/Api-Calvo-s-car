<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\Compras;
use Illuminate\Http\Request;
use App\Models\Veiculo;
use Exception;

class ComprasController extends Controller
{
    public function index()
    {
        return Compras::all();
    }

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
            if(!$veiculo->save()){
                throw new Exception("Veiculo inválido");
            }else {
                $veiculo->save();
                $puxaID = DB::select('select max(id_veiculo) from concessionaria.veiculo')[0]->{"max(id_veiculo)"};
                $compra = new Compras;
                $compra->valor = $valor["valor"];
                $compra->id_funcionario = $valor["id_funcionario"];
                $compra->id_veiculo = $puxaID;
                $compra->id_fornecedor = $valor["id_fornecedor"];
                if(!$compra->save()){
                    throw new Exception("Compra inválida");
                }else{
                    $compra->save();
                }

            }
            
        }catch(Exception $e){
            $puxaID = DB::select('select max(id_veiculo) from concessionaria.veiculo')[0]->{"max(id_veiculo)"};
            $veiculo = Veiculo::destroy($puxaID);
            return [
                "status" => "ERROR",
                "message" => $e->getMessage(),
                
            ];
        }
    }

    public function show(int $id)
    {
        $result = Compras::find($id);

        if($result) return $result;

        return [];
    }

    public function destroy(int $id)
    {
        return Compras::destroy($id);
    }
}
