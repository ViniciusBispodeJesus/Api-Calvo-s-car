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

        $veiculo = new Veiculo;

        $veiculo->ano_fabricacao = $valor['ano'];
        $veiculo->chassi = $valor['chassi'];
        $veiculo->statuss = $valor['status'];
        $veiculo->vendido = $valor['vendido'];
        $veiculo->placa = $valor['placa'];
        $veiculo->cor = $valor['cor'];
        $veiculo->id_modelo = $valor['id_modelo'];
        $veiculo->id_cliente = $valor['id_cliente'];
        $veiculo->nome = $valor['nome'];
        
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

    public function delete(int $id){
        $veiculo = Veiculo::destroy($id);
        
        return $veiculo;
    }
}
