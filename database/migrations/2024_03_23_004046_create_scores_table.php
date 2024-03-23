<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id('ScoreID');
            $table->unsignedBigInteger('GradingCriteriaID');
            $table->unsignedBigInteger('EventJudgeID');
            $table->integer('GivenScore');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('GradingCriteriaID')->references('GradingCriteriaID')->on('grading_criteria')->onDelete('cascade');
            $table->foreign('EventJudgeID')->references('EventJudgeID')->on('event_judges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
