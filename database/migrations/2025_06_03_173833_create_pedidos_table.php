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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->nullable();
            $table->string('telefono', 25)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('objeto', 30)->nullable();
            $table->string('cantidad', 10)->nullable();
            $table->string('tiempo', 5)->nullable();
            $table->string('dia', 15)->nullable();
            $table->string('hora', 10)->nullable();
            $table->string('direccion', 70)->nullable();
            $table->string('estado', 20)->default('Pendiente')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
