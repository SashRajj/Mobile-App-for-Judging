<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('EventID'); // Primary Key
            $table->unsignedBigInteger('AdminID'); // Foreign Key
            $table->string('Name');
            $table->text('Description');
            $table->dateTime('StartDate');
            $table->dateTime('EndDate');
            $table->timestamps(); // Adds created_at and updated_at columns

            // Assuming you have an 'admins' table with a primary key named 'id'
            $table->foreign('AdminID')->references('AdminID')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
