<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cortos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cortos', function (Blueprint $table) {
            $table->id();
            $table->int('master1');
            $table->int('puerto1');
            $table->int('puerto2');
            $table->int('puerto3');
            $table->int('puerto4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cortos');
    }
}
