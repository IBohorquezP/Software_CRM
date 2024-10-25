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
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id_servicio');
            $table->unsignedInteger('clientes_id_cliente'); //Foreign
            $table->string('serial');
            $table->integer('servicio');
            $table->string('componente');
            $table->integer('modelo');
            $table->integer('horometro');
            $table->string('marca');
            $table->datetime('fecha_llegada');
            $table->datetime('fecha_salida_estimada');
            $table->datetime('fecha_salida_real');
            $table->text('requisito');
            $table->text('nota')->nullable();
            $table->timestamps();

            $table->foreign('clientes_id_cliente')->references('id_cliente')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
