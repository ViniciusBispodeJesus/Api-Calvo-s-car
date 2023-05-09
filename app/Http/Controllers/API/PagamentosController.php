<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Pagamentos;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    public function index(){
        return Pagamentos::orderBy('id_pagamento')->get();
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

    public function destroy(int $id){
        return Pagamentos::destroy($id);
    }
}
