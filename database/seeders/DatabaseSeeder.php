<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Veiculo;
use App\Models\Empregado;
use App\Models\VeiculoEmpregado;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $veiculos = Veiculo::factory(30)->create();
        $empregados = Empregado::factory(5)->create();

        foreach ($veiculos as $veiculo) {

            VeiculoEmpregado::factory(2)->create([
                'veiculo_id' => $veiculo->id,

                'empregado_id' => $empregados->random()->id,
            ]);}

    }
}
