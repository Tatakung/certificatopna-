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
            $table->string('car_office')->nullable();
            $table->string('driver')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_approvals', function (Blueprint $table) {
            //
            $table->dropColumn('car_office');
            $table->dropColumn('driver');
        });
    }
};
