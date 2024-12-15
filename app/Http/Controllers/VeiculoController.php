<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{
    public function list()
    {
        $veiculo = Veiculo::factory()->make();
        dd($veiculo->toArray()); 
    }

}
