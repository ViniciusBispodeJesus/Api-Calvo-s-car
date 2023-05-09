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
        $servico->tipo = $request->input('tipo');
        $servico->valor = $request->input('valor');
        $servico->save();

        return $servico;
    }

    public function update(Request $request, Servicos $servicos)
    {
        $servicos->tipo = $request->input('tipo');
        $servicos->valor = $request->input('valor');
        $servicos->save();

        return $servicos;
    }

    public function destroy(Servicos $servicos)
    {
        $servicos->delete();

        return response()->noContent();
    }
}
