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
        Schema::table('productos', function (Blueprint $table) {
            $table->unsignedBigInteger('laboratorio')->nullable();
            $table->unsignedBigInteger('linea_farmaceutica')->nullable();  

            $table->foreign('laboratorio')->references('id')->on('laboratorios')->onDelete('set null');
            $table->foreign('linea_farmaceutica')->references('id')->on('lineas_farmaceuticas')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            // Primero, elimina las llaves foráneas
            $table->dropForeign(['laboratorio']);
            $table->dropForeign(['linea_farmaceutica']);
            
            // Luego, elimina las columnas
            $table->dropColumn('laboratorio');
            $table->dropColumn('linea_farmaceutica');
        });
    }
};
