<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_judges', function (Blueprint $table) {
            $table->id('EventJudgeID');
            $table->unsignedBigInteger('EventID');
            $table->unsignedBigInteger('JudgeID');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('EventID')->references('EventID')->on('events')->onDelete('cascade');
            $table->foreign('JudgeID')->references('JudgeID')->on('judges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_judges');
    }
}
