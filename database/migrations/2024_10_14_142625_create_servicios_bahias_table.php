<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('servicios_bahias', function (Blueprint $table) {
            $table->increments('id_servicio_bahia');
            $table->unsignedInteger('servicios_id_servicio'); //Foreign
            $table->unsignedInteger('bahias_id_bahia'); //Foreign
            $table->string('TRG')->nullable();
            $table->datetime('fecha_inicio')->nullable();
            $table->datetime('fecha_fin')->nullable();
            $table->text('alcance')->nullable();
            $table->text('herramienta')->nullable();
            $table->text('documentacion')->nullable();
            $table->text('requerimientos')->nullable();
            $table->text('actividad')->nullable();
            $table->string('nro_de_tecnicos')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('servicios_id_servicio')->references('id_servicio')->on('servicios')->constrained()->onDelete('cascade');
            $table->foreign('bahias_id_bahia')->references('id_bahia')->on('bahias')->constrained()->onDelete('cascade');

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