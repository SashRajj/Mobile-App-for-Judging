<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Add EventID column
            $table->bigInteger('EventID')->unsigned()->after('SubmissionLink');

            // Add foreign key constraint
            $table->foreign('EventID')->references('EventID')->on('events')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['EventID']);

            // Drop EventID column
            $table->dropColumn('EventID');
        });
    }
};
