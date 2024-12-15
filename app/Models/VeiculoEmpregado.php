<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeiculoEmpregado extends Model
{
    use HasFactory;

    /* necessario de adicionar protected table por que senao o seeder nao sabia por onde enviar */

    protected $table = 'veiculos_e__empregados'; 

    protected $fillable = ['veiculo_id', 'empregado_id', 'data_inicio', 'data_fim', 'kms_inicial', 'kms_final'];
    
}
