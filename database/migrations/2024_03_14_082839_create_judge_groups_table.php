<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudgeGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judge_groups', function (Blueprint $table) {
            $table->id('JudgeGroupID');
            $table->unsignedBigInteger('JudgeID');
            $table->unsignedBigInteger('GroupID');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('JudgeID')->references('JudgeID')->on('judges')->onDelete('cascade');
            $table->foreign('GroupID')->references('GroupID')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('judge_groups');
    }
}
