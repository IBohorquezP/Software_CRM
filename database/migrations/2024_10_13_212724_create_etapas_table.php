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
        Schema::create('etapas', function (Blueprint $table) {
            $table->increments('id_etapa');
            $table->unsignedInteger('servicios_id_servicio'); //Foreign
            $table->integer('nombre');
            $table->string('descripcion');
            $table->string('img');
            $table->timestamps();

            $table->foreign('servicios_id_servicio')->references('id_servicio')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etapas');
    }
};
