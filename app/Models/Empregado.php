<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empregado extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'apelido'];

    public function veiculos()
    {
        return $this->belongsToMany(Veiculo::class, 'veiculo_empregado');
    }
}
