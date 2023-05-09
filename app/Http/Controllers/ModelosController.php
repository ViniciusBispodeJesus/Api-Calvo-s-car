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
        $modelo->ano = $request->input('ano');
        $modelo->versao = $request->input('versao');
        $modelo->peso = $request->input('peso');
        $modelo->cambio = $request->input('cambio');
        $modelo->potencia_motor = $request->input('potencia_motor');
        $modelo->motor = $request->input('motor');
        $modelo->preco = $request->input('preco');
        $modelo->ipva = $request->input('ipva');
        $modelo->id_marca = $request->input('id_marca');
        $modelo->save();

        return $modelo;
    }


    public function destroy(Request $request, Modelo $modelo){
        $modelo->delete();

        return ['message' => 'Modelo deletado com sucesso'];
    }

   
    public function update(Request $request, Modelo $modelo){
        $modelo->ano = $request->input('ano');
        $modelo->versao = $request->input('versao');
        $modelo->peso = $request->input('peso');
        $modelo->cambio = $request->input('cambio');
        $modelo->potencia_motor = $request->input('potencia_motor');
        $modelo->motor = $request->input('motor');
        $modelo->preco = $request->input('preco');
        $modelo->ipva = $request->input('ipva');
        $modelo->id_marca = $request->input('id_marca');
        $modelo->save();

        return $modelo;
    }
}
