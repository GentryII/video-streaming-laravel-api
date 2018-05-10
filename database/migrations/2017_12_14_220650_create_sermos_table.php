<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSermosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sermos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('album');
            $table->string('artist');
            $table->string('genre');
            $table->string('source');
            $table->string('image');
            $table->integer('trackNumber');
            $table->integer('totalTrackCount');
            $table->integer('duration');
            $table->string('site');
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
        Schema::dropIfExists('sermos');
    }
}
