<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->integer('competition_id');
            $table->string('title');
            $table->integer('stars')->nullable();
            $table->boolean('single_room')->default('0');
            $table->integer('single_room_avivable')->nullable();
            $table->float('single_room_price', 5, 2)->nullable();
            $table->boolean('double_room')->default('0');
            $table->integer('double_room_avivable')->nullable();
            $table->float('double_room_price', 5, 2)->nullable();
            $table->boolean('triple_room')->default('0');
            $table->integer('triple_room_avivable')->nullable();
            $table->float('triple_room_price', 5, 2)->nullable();
            $table->boolean('room_for_four')->default('0');
            $table->integer('room_for_four_avivable')->nullable();
            $table->float('room_for_four_price', 5, 2)->nullable();
            $table->string('gmaps_link')->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
