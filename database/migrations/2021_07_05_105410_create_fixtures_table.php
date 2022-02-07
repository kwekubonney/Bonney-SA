<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('homeTeam');
            $table->unsignedBigInteger('awayTeam');
            $table->unsignedBigInteger('venue_id');
            $table->time('gameTime');
            $table->date('gameDate');
            $table->string('status')->default('open');
            $table->string('isPlay')->default('No');
            $table->timestamps();

            $table->foreign('homeTeam')->references('id')->on('teams');
            $table->foreign('awayTeam')->references('id')->on('teams');
            $table->foreign('venue_id')->references('id')->on('venues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixture');
    }
}
