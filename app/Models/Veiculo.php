<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    
    /* https://laravel.com/docs/master/eloquent#mass-assignment */
    protected $fillable = ['marca', 'modelo', 'matricula', 'foi_comprado', 'tipo_combustivel', 'cor', 'ano', 'vezes_considerada_compra'];

    public function empregados()
    {
        return $this->belongsToMany(Empregado::class, 'veiculo_empregado');
    }
}

