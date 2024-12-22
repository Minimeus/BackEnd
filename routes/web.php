<?php
/* Vou utilizar controller, para view todos os modelos e factories de uma so vez */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\EmpregadoController;
use App\Http\Controllers\VeiculoEmpregadoController;

//Primeiras rotas para testar banco de dados

Route::get('/', function () {
    return "Pagina Inicial : Primeira rota criada para a EmpresaFofinhos";
});

Route::get('/lista-veiculos-empregados', [VeiculoEmpregadoController::class, 'list']);

Route::get('/lista-empregados', [EmpregadoController::class, 'list']);


// Rotas de visualisacao da informacao geral sobre a frota,
Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');


//Ecra de formulario
Route::get('/veiculos/criar', [VeiculoController::class, 'create'])->name('veiculos.criar');
// como em management students, adicionou um metodo para gravar o veiculo criado:
Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');
//parar criar 10 automaticamente :
Route::get('/seed-veiculos', [VeiculoController::class, 'seed'])->name('veiculos.seed');

//editar o veiculo
Route::get('/veiculos/{veiculo}/editar', [VeiculoController::class, 'editar'])->name('veiculos.editar');
Route::put('/veiculos/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');

// apagar o veiculo
Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destruir');


//Detalhes do veiculo
Route::get('/veiculos/{id}', [VeiculoController::class, 'show'])->name('veiculos.mostrar');



/*
Route::get('/test-factories', function () {

    return 'Dados gerados!';

    $veiculo = Veiculo::factory()->make();
    dd($veiculo->toArray()); 
    $empregado = Empregado::factory()->make();
    $veiculoempregado = VeiculoEmpregado::factory()->make(); 
});
*/
