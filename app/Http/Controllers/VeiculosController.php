<?php

namespace App\Http\Controllers;

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

        $marca = new Veiculo;

        $marca->id_veiculo = $valor['id'];
        $marca->ano_fabricacao = $valor['ano'];
        $marca->chassi = $valor['chassi'];
        $marca->statuss = $valor['status'];
        $marca->vendido = $valor['vendido'];
        $marca->placa = $valor['placa'];
        $marca->cor = $valor['cor'];
        $marca->id_modelo = $valor['id_modelo'];
        $marca->id_cliente = $valor['id_cliente'];
        $marca->nome = $valor['nome'];
        
        try{
            $marca->save();
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }
        
        return $valor;
    }

    public function delete(int $id){
        $veiculo = Veiculo::destroy($id);
        
        return $veiculo;
    }
}
