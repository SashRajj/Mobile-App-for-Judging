<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judges', function (Blueprint $table) {
            $table->id('JudgeID'); // Creates an auto-incrementing UNSIGNED BIGINT (primary key) named JudgeID
            $table->string('Name');
            $table->string('Email')->unique(); // Ensures that the Email column is unique across all rows
            $table->string('Password');
            $table->timestamps(); // Optional, adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('judges');
    }
}
