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
        Schema::create('bahias', function (Blueprint $table) {
            $table->increments('id_bahia');
            $table->unsignedInteger('etapas_id_etapa'); //Foreign
            $table->string('nombre');
            $table->string('img');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('etapas_id_etapa')->references('id_etapa')->on('etapas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahias');
    }
};
