<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasController extends Controller
{
    public function index(){
        return Marca::orderBy('id_marca')->get();
    }

    public function show(int $id){
        $result = Marca::find($id);

        if($result) return $result;

        return [];
    }

    public function store(Request $request){
        $valor = $request->input();

        $marca = new Marca;

        $marca->id_marca = $valor['id'];
        $marca->nome = $valor['nome'];
        
        try{
            $marca->save();
        }catch(\Exception $e){
            return [
                "status" => "ERROR",
                "message" => $e->getMessage()
            ];
        }
        
        return $valor;
    }

    public function destroy(int $id){
        $result = Marca::destroy($id);

        return $result;
    }
}
