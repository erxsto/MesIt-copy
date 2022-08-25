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
            $table->integer('master1');
            $table->integer('puerto1');
            $table->integer('puerto2');
            $table->integer('puerto3');
            $table->integer('puerto4');
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
        Schema::dropIfExists('cortos');
    }
}
