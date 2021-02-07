<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvisionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provisionals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('competition_id');
            $table->integer('heads_of_delegation')->default(0);
            $table->integer('team_managers')->default(0);
            $table->integer('coaches')->default(0);
            $table->integer('doctors')->default(0);
            $table->integer('physiotherapists')->default(0);
            $table->integer('judges')->default(0);
            $table->integer('women_pairs')->default(0);
            $table->integer('mixed_pairs')->default(0);
            $table->integer('man_pairs')->default(0);
            $table->integer('woman_groups')->default(0);
            $table->integer('men_groups')->default(0);
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
        Schema::dropIfExists('provisionals');
    }
}
