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
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id',false)->primary();
            $table->string('fantasia');
            $table->string('status');
            $table->string("cep");
            $table->string("logradouro")->nullable();
            $table->string("complemento")->nullable();
            $table->string("bairro")->nullable();
            $table->string("localidade")->nullable();
            $table->string("uf")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
