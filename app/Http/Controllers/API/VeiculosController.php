<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculosController extends Controller{

    public function index(){
        return Veiculo::orderBy("id_veiculo")->get();
    }

    public function show(int $id){
        $result = Veiculo::find($id);

        if($result) return $result;

        return [];
    }

    public function store(Request $request){
        $valor = $request->input();

        $veiculo = new Veiculo;

        $veiculo->ano_fabricacao = $valor['ano'];
        $veiculo->chassi = $valor['chassi'];
        $veiculo->statuss = $valor['status'];
        $veiculo->vendido = $valor['vendido'];
        $veiculo->placa = $valor['placa'];
        $veiculo->cor = $valor['cor'];
        $veiculo->id_modelo = $valor['id_modelo'];
        $veiculo->id_cliente = $valor['id_cliente'];
        
        try{
            $veiculo->save();
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }
        
        return $valor;
    }

    public function update(Request $request, int $id)
    {
        $valor = $request->input();

        $veiculo = Veiculo::find($id);

        foreach($valor as $c => $v){
            if($c === "statuss") $veiculo->statuss = $v;
            if($c === "vendido") $veiculo->vendido = $v;
            if($c === "cor") $veiculo->cor = $v;
        }

        try{
            $veiculo->save();
            return $valor;
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }
    }

    public function destroy(int $id){
        return Veiculo::destroy($id);
    }
}
