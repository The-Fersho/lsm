<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('atenciones', function (Blueprint $table) {
            $table->integer('nivel')->default(1)->nullable()->after('tipo_atencion');
        });
    }

    public function down(): void
    {
        Schema::table('atenciones', function (Blueprint $table) {
            $table->dropColumn('nivel');
        });
    }
};
