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
        Schema::table('travel_approvals', function (Blueprint $table) {
            //
            $table->string('prefix')->nullable(); // เพิ่มคอลัมน์ prefix
            $table->string('lname')->nullable(); // เพิ่มคอลัมน์ lname

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_approvals', function (Blueprint $table) {
            //
            $table->dropColumn('prefix'); // ลบคอลัมน์ prefix
            $table->dropColumn('lname'); // ลบคอลัมน์ lname

        });
    }
};
