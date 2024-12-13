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
        Schema::create('externos', function (Blueprint $table) {
            $table->increments('id_externo');
            $table->unsignedInteger('servicios_id_servicio'); //Foreign
            $table->string('proveedor')->nullable();
            $table->string('componente')->nullable();
            $table->string('serial')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('ot')->nullable();
            $table->datetime('fecha_salida')->nullable();
            $table->datetime('fecha_llegada')->nullable();
            $table->string('contador')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('servicios_id_servicio')->references('id_servicio')->on('servicios')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('externos');
    }
};
