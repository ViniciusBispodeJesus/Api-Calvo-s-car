<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;


class UsuariosController extends Controller
{
    public function index(){
        return Usuarios::orderBy('cpf')->get();
    }

    public function show(int $cpf){
        $result = Usuarios::find($cpf);

        if($result) return $result;

        return [];
    }

    public function store(Request $request){
        $valor = $request->input();

        $usuario = new Usuarios;

        $usuario->cpf = $valor['cpf'];
        $usuario->nome = $valor['nome'];
        $usuario->sobrenome = $valor['sobrenome'];
        $usuario->sexo = $valor['sexo'];
        $usuario->email = $valor['email'];
        $usuario->senha = $valor['senha'];
        $usuario->telefone = $valor['telefone'];
        $usuario->endereco = $valor['endereco'];
        $usuario->data_nascimento = $valor['data_nascimento'];
        
        try{
            $usuario->save();
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }
        
        return $valor;
    }

    public function destroy(int $cpf){
        $result = Usuarios::destroy($cpf);

        return $result;
    }
}
