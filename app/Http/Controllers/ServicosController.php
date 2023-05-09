<?php

namespace App\Http\Controllers;

use App\Models\Servicos;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function index(){
        return Servicos::orderBy('id_servico')->get();
    }

    public function show(int $id){
        $result = Servicos::find($id);

        if($result) return $result;

        return [];
    }

    public function store(Request $request)
    {
        $servico = new Servicos();
        $valor = $request->input();
        $servico->tipo = $valor['tipo'];
        $servico->valor = $valor['valor'];

        try{
            $servico->save();
            return $valor;
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }

        return $servico;
    }

    public function update(Request $request, Servicos $servicos)
    {
        $valor = $request->input();
        $servicos->tipo = $valor['tipo'];
        $servicos->valor = $valor['valor'];

        try{
            $servicos->save();
            return $valor;
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }

        return $servicos;
    }

    public function destroy(Servicos $servicos)
    {
        $result = Cliente::destroy($id);

        return $result;
    }
}
