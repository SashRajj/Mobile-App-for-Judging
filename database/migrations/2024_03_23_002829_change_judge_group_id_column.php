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
        Schema::table('your_table_name_here', function (Blueprint $table) {
            // Rename the column from JudgeGroupID to EventJudgeID
            $table->renameColumn('JudgeGroupID', 'EventJudgeID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('your_table_name_here', function (Blueprint $table) {
            // Reverse the column rename if necessary
            $table->renameColumn('EventJudgeID', 'JudgeGroupID');
        });
    }
};
