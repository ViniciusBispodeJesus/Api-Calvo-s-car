<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Fornecedores::orderBy('id_marca')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valor = $request->input();

        $fornecedores = new Fornecedores;

        $fornecedores->cnpj = $valor['cnpj'];
        $fornecedores->razao_social = $valor['razao_social'];
        $fornecedores->endereco = $valor['endereco'];
        $fornecedores->telefone = $valor['telefone'];
        $fornecedores->id_marca = $valor['id_marca'];

        try{
            $fornecedores->save();
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }

        return $valor;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $cnpj)
    {
        $result = Fornecedores::find($cnpj);

        if($result) return $result;

        return [];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $cnpj)
    {
        $valor = $request->input();

        $fornecedores = Fornecedores::find($cnpj);

        foreach($valor as $c => $v){
            if($c === "razao_social") $fornecedores->razao_social = $v;
            if($c === "endereco") $fornecedores->endereco = $v;
            if($c === "telefone") $fornecedores->telefone = $v;
        }

        try{
            $fornecedores->save();
            return $valor;
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return Fornecedores::destroy($id);
    }
}
