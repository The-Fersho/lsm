<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('atenciones', function (Blueprint $table) {
            //Change the field 'asignatura' type to 'string'
            $table->string('asignatura')->change();
        });
    }

    public function down(): void
    {
        Schema::table('atenciones', function (Blueprint $table) {
            //Change the field 'asignatura' type to 'integer'
            $table->integer('asignatura')->change();
        });
    }
};
