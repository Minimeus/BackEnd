<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marca' => fake()->randomElement(['Tesla', 'Lamborghini', 'Xiaomi', 'Toyota', 'Peugeot', 'Suzuki']),

            'modelo' => fake()->word(),

            //https://www.phptutorial.net/php-tutorial/php-strtoupper/
            //https://laracasts.com/discuss/channels/laravel/how-to-write-regex-in-laravel
            'matricula' => strtoupper(fake()->regexify('[A-Z]{2}[0-9]{2}[A-Z]{2}')),
            'foi_comprado' => fake()->boolean(),
            'tipo_combustivel' => fake()->randomElement(['Gasolina', 'Diesel', 'Elétrico', 'Híbrido']),

            //https://fakerphp.org/formatters/color/
            'cor' => fake()->safeColorName(),
            'ano' => fake()->numberBetween(1950, 2024),
            'vezes_considerada_compra' => fake()->numberBetween(0, 100),
        ];
    }
}
