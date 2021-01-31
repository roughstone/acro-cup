<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefinativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definatives', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('competition_id');
            $table->integer('heads_of_delegation')->default(0);
            $table->integer('team_managers')->default(0);
            $table->integer('coaches')->default(0);
            $table->integer('doctors')->default(0);
            $table->integer('physiotherapists')->default(0);
            $table->integer('judges')->default(0);
            $table->integer('w_p_y')->default(0);
            $table->integer('m_p_y')->default(0);
            $table->integer('mix_p_y')->default(0);
            $table->integer('w_g_y')->default(0);
            $table->integer('m_g_y')->default(0);
            $table->integer('w_p_a1')->default(0);
            $table->integer('m_p_a1')->default(0);
            $table->integer('mix_p_a1')->default(0);
            $table->integer('w_g_a1')->default(0);
            $table->integer('m_g_a1')->default(0);
            $table->integer('w_p_a2')->default(0);
            $table->integer('m_p_a2')->default(0);
            $table->integer('mix_p_a2')->default(0);
            $table->integer('w_g_a2')->default(0);
            $table->integer('m_g_a2')->default(0);
            $table->integer('w_p_j')->default(0);
            $table->integer('m_p_j')->default(0);
            $table->integer('mix_p_j')->default(0);
            $table->integer('w_g_j')->default(0);
            $table->integer('m_g_j')->default(0);
            $table->integer('w_p_s')->default(0);
            $table->integer('m_p_s')->default(0);
            $table->integer('mix_p_s')->default(0);
            $table->integer('w_g_s')->default(0);
            $table->integer('m_g_s')->default(0);
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
        Schema::dropIfExists('definatives');
    }
}
