<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Funcionario;
use App\Models\Cliente;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    public function index()
    {
        return Funcionario::all();
    }

    public function store(Request $request)
    {
        $valor = $request->input();

        $funcionario = new Funcionario;

        $clientes = Cliente::all();
        $existe = false;
        foreach($clientes as $c => $v){
            if($c === "cpf" && $v === $valor['cpf']) $existe = true;
        }
        
        if($existe) return [
            "status" => "ERROR",
            "message" => "CPF already registered as client"
        ];        
        
        $funcionario->matricula = $valor['matricula'];
        $funcionario->salario = $valor['salario'];
        $funcionario->cargo = $valor['cargo'];
        $funcionario->cpf = $valor['cpf'];
        
        try{
            $funcionario->save();
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }
        
        return $valor;
    }

    public function show(int $matricula)
    {
        $result = Funcionario::find($matricula);

        if($result) return $result;

        return [];
    }

    public function update(Request $request, int $matricula)
    {
        $valor = $request->input();

        $funcionarios = Funcionario::find($matricula);

        foreach($valor as $c => $v){
            if($c === "salario") $funcionarios->salario = $v;
            if($c === "cargo") $funcionarios->cargo = $v;
        }

        try{
            $funcionarios->save();
            return $valor;
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }
    }

    public function destroy(int $matricula)
    {
        return Funcionario::destroy($matricula);
    }
}
