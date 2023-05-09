<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModelosController extends Controller
{
    public function index(){
        return Modelo::orderBy('id_modelo')->get();
    }

    public function show(int $id){
        $result = Modelo::find($id);

        if($result) return $result;

        return [];
    }
  
    public function store(Request $request){
        $modelo = new Modelo();

        $modelo->id_modelo = $request->input('id_modelo');
        $modelo->ano = $request->input('ano');
        $modelo->versao = $request->input('versao');
        $modelo->peso = $request->input('peso');
        $modelo->cambio = $request->input('cambio');
        $modelo->potencia_motor = $request->input('potencia_motor');
        $modelo->motor = $request->input('motor');
        $modelo->preco = $request->input('preco');
        $modelo->ipva = $request->input('ipva');
        $modelo->id_marca = $request->input('id_marca');

        try{
            $modelo->save();
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }

        return $modelo;
    }


    public function destroy(int $id){
        return Modelo::destroy($id);
    }

    public function update(Request $request, int $id){
        $valor = $request->input();

        $modelo = Modelo::find($id);

        foreach($valor as $c => $v){
            if($c === "preco") $modelo->preco = $v;
            if($c === "ipva") $modelo->ipva = $v;
        }

        try{
            $modelo->save();
            return $valor;
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }

        return $valor;
    }
}
