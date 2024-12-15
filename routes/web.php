<?php
/* Vou utilizar controller, para view todos os modelos e factories de uma so vez */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\EmpregadoController;
use App\Http\Controllers\VeiculoEmpregadoController;

Route::get('/', function () {
    return "Primeira rota criada para a EmpresaFofinhos";
});

Route::get('/lista-veiculos-empregados', [VeiculoEmpregadoController::class, 'list']);

Route::get('/lista-veiculos', [VeiculoController::class, 'list']);
Route::get('/lista-empregados', [EmpregadoController::class, 'list']);



/*
Route::get('/test-factories', function () {

    return 'Dados gerados!';

    $veiculo = Veiculo::factory()->make();
    dd($veiculo->toArray()); 
    $empregado = Empregado::factory()->make();
    $veiculoempregado = VeiculoEmpregado::factory()->make(); 
});
*/
