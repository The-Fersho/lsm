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
        Schema::create('atenciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('libro_id')->nullable()->constrained('libros');
            //Crear la relacion polimorfica para la tabla estudiantes o docentes
            $table->morphs('atencionable');
            $table->date('fecha');
            $table->time('hora');
            $table->date('fecha_devolucion')->nullable();
            $table->integer('asignatura')->nullable();
            $table->integer('motivo')->nullable();
            $table->integer('tipo_atencion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atenciones');
    }
};
