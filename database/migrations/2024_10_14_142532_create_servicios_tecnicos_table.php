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
        Schema::create('servicios_tecnicos', function (Blueprint $table) {
            $table->increments('id_servicio_tecnico');
            $table->unsignedInteger('servicios_id_servicio'); //Foreign
            $table->unsignedInteger('tecnicos_id_tecnico'); //Foreign
            $table->timestamps();

            $table->foreign('servicios_id_servicio')->references('id_servicio')->on('servicios');
            $table->foreign('tecnicos_id_tecnico')->references('id_tecnico')->on('tecnicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_tecnicos');
    }
};
