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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->nullable();
            $table->string('tamaño', 30)->nullable();
            $table->string('tiempo1', 15)->nullable();
            $table->string('tiempo2', 15)->nullable();
            $table->string('tiempo3', 15)->nullable();
            $table->string('tiempo4', 15)->nullable();
            $table->string('lavado', 15)->nullable();
            $table->string('deposito', 15)->nullable();
            $table->string('cantidad', 10)->nullable();
            $table->string('disponible', 10)->nullable();
            $table->string('estado', 10)->default('Activo')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updayed_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
