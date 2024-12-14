<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Veiculo;
use App\Models\Empregado;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VeiculoEmpregado>
 */
class VeiculoEmpregadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'veiculo_id' => Veiculo::factory(),
            'empregado_id' => Empregado::factory(),

            //tenho que corresponder (now e 6000) porque senão envia propostas erradas.
            'data_inicio' => fake()->dateTimeBetween('-3 year', 'now'),
            'data_fim' => fake()->optional()->dateTimeBetween('now', '+1 year'),
            'kms_inicial' => fake()->numberBetween(0, 6000),
            'kms_final' => fake()->optional()->numberBetween(6000, 100000),
        ];
    }
}
