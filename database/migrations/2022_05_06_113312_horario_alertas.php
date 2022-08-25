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
            $table->integer('user_id');
            $table->string('h_ini');
            $table->string('h_fin');
            $table->integer('lun');
            $table->integer('mar');
            $table->integer('mier');
            $table->integer('jue');
            $table->integer('vier');
            $table->integer('sab');
            $table->integer('dom');
            $table->integer('status');
            $table->timestamps();

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
