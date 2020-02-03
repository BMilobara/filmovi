<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmovi', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('naslov');
			$table->integer('godina');
			$table->integer('trajanje');
			$table->string('slika');
			$table->unsignedBigInteger('id_zanr');
			
			$table->foreign('id_zanr')->references('id')->on('zanr')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filmovi');
    }
}
