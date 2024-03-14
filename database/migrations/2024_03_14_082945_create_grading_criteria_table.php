<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradingCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grading_criteria', function (Blueprint $table) {
            $table->id('GradingCriteriaID');
            $table->unsignedBigInteger('EventID');
            $table->string('Name');
            $table->text('Description')->nullable();
            $table->integer('MaxScore');
            $table->decimal('AverageScore', 5, 2)->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('EventID')->references('EventID')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grading_criteria');
    }
}
