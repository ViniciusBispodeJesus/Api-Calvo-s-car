<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PagamentosController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\SolicitacoesController;

Route::apiResource('/marcas', MarcasController::class);
Route::apiResource('/modelos', ModelosController::class);
Route::apiResource('/clientes', ClientesController::class); //vt
Route::apiResource('/funcionarios', FuncionariosController::class); //vt
Route::apiResource('/veiculos', VeiculosController::class);
Route::apiResource('/servicos', ServicosController::class);
Route::apiResource('/solicitacoes', SolicitacoesController::class);
Route::apiResource('/compras', ComprasController::class);
Route::apiResource('/vendas', VendasController::class);
Route::apiResource('/pagamentos', PagamentosController::class);
Route::apiResource('/fornecedores', FornecedoresController::class);
Route::apiResource('/usuarios', UsuariosController::class); //vt
