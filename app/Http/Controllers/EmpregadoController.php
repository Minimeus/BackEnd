<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empregado;

class EmpregadoController extends Controller
{
    public function list()
    {
        $empregado = Empregado::factory()->make();
        dd($empregado->toArray());
    }

}
