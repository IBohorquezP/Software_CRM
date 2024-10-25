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
        Schema::create('servicios_bahias', function (Blueprint $table) {
            $table->increments('id_servicio_bahia');
            $table->unsignedInteger('servicios_id_servicio'); //Foreign
            $table->unsignedInteger('bahias_id_bahia'); //Foreign
            $table->string('TRG');
            $table->datetime('fecha_inico');
            $table->datetime('fecha_fin');
            $table->text('alcance');
            $table->string('herramienta');
            $table->text('documentacion');
            $table->text('requerimientos');
            $table->text('actividad');
            $table->timestamps();

            $table->foreign('servicios_id_servicio')->references('id_servicio')->on('servicios');
            $table->foreign('bahias_id_bahia')->references('id_bahia')->on('bahias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_bahias');
    }
};
