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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id(); 
            $table->string('marca', 50); 
            $table->string('modelo', 50); 
            $table->string('matricula', 6)->unique(); 

            //informacao adicionada apos primeira sauvegarde
            $table->boolean('foi_comprado')->default(false); 
            $table->string('tipo_combustivel', 20); 
            $table->string('cor', 20); 
            $table->integer('ano'); 
            $table->integer('vezes_considerada_compra'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
