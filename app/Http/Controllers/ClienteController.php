<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

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

    // public function store(Request $request){
    //     $valor = $request->input();

    //     $cliente = new Cliente;

    //     $cliente->id_Cliente = $valor['id'];
    //     $cliente->nome = $valor['nome'];
        
    //     try{
    //         $cliente->save();
    //     }catch(\Exception $e){
    //         return [
    //             "status" => "ERROR",
    //             "message" => $e->getMessage()
    //         ];
    //     }
        
    //     return $valor;
    // }

    // public function destroy(int $id){
    //     $result = Cliente::destroy($id);

    //     return $result;
    // }
}
