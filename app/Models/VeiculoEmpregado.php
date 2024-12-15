<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeiculoEmpregado extends Model
{
    use HasFactory;

    protected $fillable = ['veiculo_id', 'empregado_id', 'data_inicio', 'data_fim', 'kms_inicial', 'kms_final'];
    
}
