<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControlVar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_var', function (Blueprint $table) {
            $table->id();
            $table->integer('izquierdo');
            $table->integer('derecho');
            $table->integer('stop');
            $table->integer('reset');
            $table->float('amperaje', 8, 2);
            $table->float('voltaje', 8, 2);
            $table->float('frecuencia', 8, 2);
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
        Schema::dropIfExists('control_var');
    }
}
