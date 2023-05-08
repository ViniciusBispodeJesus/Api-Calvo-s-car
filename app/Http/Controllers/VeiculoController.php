<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller{

    public function index(){
        return Veiculo::all();
    }

    public function show(int $id){
        $result = Veiculo::find($id);

        if($result) return $result;

        return [];
    }

    public function store(Request $request){
        return $request->input();
    }

    public function delete(int $id){
        $veiculo = Veiculo::find($id);
        if($veiculo){
            $veiculo->delete();
            return "Veículo excluído com sucesso";
        }
        return "Veículo não encontrado";
    }
}
