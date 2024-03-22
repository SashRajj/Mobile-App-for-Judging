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
        Schema::table('event_judges', function (Blueprint $table) {
            // Add GroupID column
            $table->unsignedBigInteger('GroupID');

            // Add foreign key constraints
            $table->foreign('GroupID')->references('GroupID')->on('groups');

            // Make combination of EventID, JudgeID, and GroupID unique
            $table->unique(['EventID', 'JudgeID', 'GroupID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_judges', function (Blueprint $table) {
            // Drop unique constraint
            $table->dropUnique(['EventID', 'JudgeID', 'GroupID']);

            // Drop foreign key constraint
            $table->dropForeign(['GroupID']);

            // Drop GroupID column
            $table->dropColumn('GroupID');
        });
    }
};
