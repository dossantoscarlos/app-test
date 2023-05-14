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
        Schema::create('spreadsheets', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('status')->default('pendente');
            $table->string('quantidade_lida');
            $table->string('quantidade_valida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spreadsheets');
    }
};
