<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameassignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameassigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fixture_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('fixture_id')->references('id')->on('fixtures');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gameassigns');
    }
}
