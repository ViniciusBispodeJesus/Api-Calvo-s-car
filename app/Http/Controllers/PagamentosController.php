<?php

namespace App\Http\Controllers;

use App\Models\Pagamentos;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    public function index(){
        return Pagamentos::orderBy('id_pagamentos')->get();
    }


    public function store(Request $request){
        $pagamento = new Pagamentos;

        $pagamento->tipo = $request->input('tipo');
        $pagamento->valor = $request->input('valor');

        try {
            $pagamento->save();
            return $pagamento;
        } catch (\Exception $e) {
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }

        
    }


    public function show(int $id){
        $result = Pagamentos::find($id);

        if($result) return $result;

        return [];
    }

 
    public function update(Request $request, int $id)
    {
        $pagamento = Pagamentos::find($id);

        $pagamento->tipo = $request->input('tipo');
        $pagamento->valor = $request->input('valor');

        try {
            $pagamento->save();
            return $pagamento;
        } catch (\Exception $e) {
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }

    }

    public function destroy(int $id){
        $result  = Pagamentos::destroy($id);
    }
}
