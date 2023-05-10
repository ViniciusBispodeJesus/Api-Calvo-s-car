<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{
    UsuariosController,
    MarcasController,
    VendasController,
    VeiculosController,
    ComprasController,
    FornecedoresController,
    FuncionarioController,
    PagamentosController,
    ServicosController,
    SolicitacoesController,
    ModelosController,
    ClienteController
};

Route::apiResource('/marcas', MarcasController::class);
Route::apiResource('/modelos', ModelosController::class);
Route::apiResource('/clientes', ClienteController::class);
Route::apiResource('/funcionarios', FuncionarioController::class);
Route::apiResource('/veiculos', VeiculosController::class);
Route::apiResource('/servicos', ServicosController::class);
Route::apiResource('/solicitacoes', SolicitacoesController::class);
Route::apiResource('/compras', ComprasController::class);
Route::apiResource('/vendas', VendasController::class);
Route::apiResource('/pagamentos', PagamentosController::class);
Route::apiResource('/fornecedores', FornecedoresController::class);
Route::apiResource('/usuarios', UsuariosController::class);

Route::get('/hello', function(Request $reques){
    return response() -> json([
        "code"=>200,
        "message"=>'Hello World'
    ]);
});