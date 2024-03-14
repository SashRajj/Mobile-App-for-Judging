<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id('GroupID'); // Creates an auto-incrementing UNSIGNED BIGINT (primary key) named GroupID
            $table->unsignedBigInteger('EventID'); // Foreign key for the events table
            $table->string('Name');
            $table->unsignedBigInteger('ProjectID'); // Foreign key for the projects table
            $table->timestamps(); // Optional, but recommended: created_at and updated_at columns

            // Define the foreign key constraints
            $table->foreign('EventID')->references('EventID')->on('events')->onDelete('cascade');
            $table->foreign('ProjectID')->references('ProjectID')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
