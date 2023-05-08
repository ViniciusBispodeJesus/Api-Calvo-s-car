<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasController extends Controller
{
    public function index(){
        return Marca::all();
    }

    public function show(int $id){
        $result = Marca::find($id);

        if($result) return $result;

        return [];
    }

    public function store(Request $request){
        return $request->input();
    }

}
