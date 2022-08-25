<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Variador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variador', function (Blueprint $table) {
            $table->id();
            $table->float('fase1A', 8, 2);
            $table->float('fase2A', 8, 2);
            $table->float('fase3A', 8, 2);
            $table->float('voltsL1', 8, 2);
            $table->float('voltsL2', 8, 2, 8, 2);
            $table->float('voltsL3');
            $table->float('hz', 8, 2);
            $table->float('facpotencia', 8, 2);
            $table->float('pottactiva', 8, 2);
            $table->float('pottreactiva', 8, 2);
            $table->float('energiaa', 8, 2);
            $table->float('energiar', 8, 2);
            $table->float('consumo_total', 8, 2);
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
        Schema::dropIfExists('variador');
    }
}
