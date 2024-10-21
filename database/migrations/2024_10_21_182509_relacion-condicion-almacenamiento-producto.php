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
        Schema::create('condicion_producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('condicion_almacenamiento_id');  

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('condicion_almacenamiento_id')->references('id')->on('condicion_almacenamiento')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condicion_producto');
    }
};
