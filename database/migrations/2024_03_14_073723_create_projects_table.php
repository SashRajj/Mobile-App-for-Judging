<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('ProjectID'); // Creates an auto-incrementing UNSIGNED BIGINT (primary key) named ProjectID
            $table->string('Title');
            $table->text('Description');
            $table->string('SubmissionLink')->nullable(); // Nullable means the submission link is optional
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
        Schema::dropIfExists('projects');
    }
}
