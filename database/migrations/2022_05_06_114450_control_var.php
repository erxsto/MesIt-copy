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
            $table->int('izquierdo');
            $table->int('derecho');
            $table->int('stop');
            $table->int('reset');
            $table->float('amperaje', 8, 2);
            $table->float('voltaje', 8, 2);
            $table->float('frecuencia', 8, 2);
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
