<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Funcionario;

class ClienteController extends Controller
{
    public function index(){
        return Cliente::orderBy('id_cliente')->get();
    }

    public function show(int $id){
        $result = Cliente::find($id);

        if($result) return $result;

        return [];
    }

    public function store(Request $request){
        $valor = $request->input();

        $cliente = new Cliente;

        $funcionarios = Funcionario::all();
        $existe = false;
        foreach($funcionarios as $c => $v){
            if($c === "cpf" && $v === $valor['cpf']) $existe = true;
        }
        
        if(!$existe) return [
            "status" => "ERROR",
            "message" => "CPF already registered as employee"
        ];        

        $cliente->cpf = $valor['cpf'];
        
        try{
            $cliente->save();
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }
        
        return $valor;
    }

    public function destroy(int $id){
        return Cliente::destroy($id);
    }
}
