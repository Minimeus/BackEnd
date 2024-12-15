<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empregado>
 */
class EmpregadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /* name criou problemas no mysql porque faz tudo (nome, apelido, sufixo) e torna-se demasiado longo */
            'nome' => fake()->firstName(),
            'apelido' => fake()->lastName(),
        ];
    }
}

