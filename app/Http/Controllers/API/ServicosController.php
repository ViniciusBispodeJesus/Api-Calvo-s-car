<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

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
        $servicos = new Servicos();

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
    }

    public function update(Request $request, int $id)
    {
        $valor = $request->input();
        
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
    }

    public function destroy(Servicos $servico)
    {
        return Servicos::destroy($servico);
    }
}
