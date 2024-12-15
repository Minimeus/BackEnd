<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-factories', function () {
    $veiculo = Veiculo::factory()->make();
    //return view('welcome');
    
});
