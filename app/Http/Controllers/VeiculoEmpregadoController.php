<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VeiculoEmpregado;

class VeiculoEmpregadoController extends Controller
{
    public function list()
    {
        $veiculoempregado = VeiculoEmpregado::factory()->make();
        dd($veiculoempregado->toArray()); 
    }

}
