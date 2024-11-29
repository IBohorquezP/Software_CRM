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
            $table->unsignedInteger('etapas_id_etapa');//Foreign
            $table->string('serial');
            $table->integer('servicio');
            $table->string('componente');
            $table->string('modelo');
            $table->string('horometro')->nullable();
            $table->string('marca')->nullable();
            $table->datetime('fecha_llegada');
            $table->datetime('fecha_salida_estimada');
            $table->datetime('fecha_salida_real')->nullable();
            $table->integer('contador')->nullable();
            $table->text('requisito')->nullable();
            $table->text('nota')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('clientes_id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('etapas_id_etapa')->references('id_etapa')->on('etapas')->onDelete('cascade');
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
