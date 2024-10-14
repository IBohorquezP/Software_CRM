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
            $table->integer('cedula');
            $table->string('serial');
            $table->string('componente');
            $table->integer('servicio');
            $table->integer('modelo');
            $table->integer('horometro');
            $table->string('marca');
            $table->datetime('fecha_llegada');
            $table->text('requisito');
            $table->text('nota')->nullable();
            $table->timestamps();
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
