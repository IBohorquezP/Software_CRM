<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('servicios_repuestos', function (Blueprint $table) {
            $table->increments('id_servicio_repuesto');
            $table->unsignedInteger('servicios_id_servicio'); //Foreign
            $table->unsignedInteger('repuestos_id_repuesto'); //Foreign
            $table->datetime('fecha_inicio_cotizacion')->nullable();
            $table->datetime('fecha_fin_cotizacion')->nullable();
            $table->string('contador_cotizacion')->nullable();
            $table->string('nro_orden')->nullable();
            $table->datetime('fecha_inicio_colocacion')->nullable();
            $table->datetime('fecha_fin_colocacion')->nullable();
            $table->string('contador_colocacion')->nullable();
            $table->timestamps();

            $table->foreign('servicios_id_servicio')->references('id_servicio')->on('servicios')->constrained()->onDelete('cascade');
            $table->foreign('repuestos_id_repuesto')->references('id_repuesto')->on('repuestos')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_repuestos');
    }
};
