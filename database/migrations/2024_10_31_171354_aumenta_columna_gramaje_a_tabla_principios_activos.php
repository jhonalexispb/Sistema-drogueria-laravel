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
        Schema::table('principios_activos', function (Blueprint $table) {
            $table->string('concentracion')->after('nombre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('principios_activos', function (Blueprint $table) {
            $table->dropColumn('concentracion');
        });
    }
};
