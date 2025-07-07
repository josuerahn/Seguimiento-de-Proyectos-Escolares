<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('entregas', function (Blueprint $table) {
            $table->string('calificacion')->nullable()->after('fecha_entrega'); // Puede ser string o decimal si querés números
        });
    }

    public function down()
    {
        Schema::table('entregas', function (Blueprint $table) {
            $table->dropColumn('calificacion');
        });
    }

};
