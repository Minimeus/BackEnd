<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('veiculos_e__empregados', function (Blueprint $table) {

            $table->timestamps();

            $table->id(); 

            //ligacoes as duas outras tabelas : https://laravel.com/docs/11.x/migrations#column-method-foreignId
                // The foreignId method creates an UNSIGNED BIGINT equivalent column

            $table->foreignId('veiculo_id')->constrained('veiculos')->onDelete('cascade'); 
            //contrained para a chave foreign em veiculos https://laravel.com/docs/11.x/migrations#foreign-key-constraints 
            //onDelete para apagar nesta tabela quando um row é apagado noutra tabela
            
            $table->foreignId('empregado_id')->constrained('empregados')->onDelete('cascade'); 



            /* atualizado de $table->integer('horas_de_conducao'); para estas duas infos */
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim')->nullable(); 

            $table->integer('kms_inicial'); 
            $table->integer('kms_final'); 
            $table->boolean('carro_vendido')->default(false); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos_e__empregados');
    }
};
