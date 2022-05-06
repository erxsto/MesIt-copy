<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HorarioAlertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_alertas', function (Blueprint $table) {
            $table->id();
            $table->int('user_id');
            $table->string('h_ini');
            $table->string('h_fin');
            $table->int('lun');
            $table->int('mar');
            $table->int('mier');
            $table->int('jue');
            $table->int('vier');
            $table->int('sab');
            $table->int('dom');
            $table->int('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario_alertas');
    }
}
