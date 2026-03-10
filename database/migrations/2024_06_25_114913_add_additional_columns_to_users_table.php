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
            $table->string('section')->nullable()->after('department');
            $table->string('division')->nullable()->after('section');
            $table->string('phone_number')->nullable()->after('division');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_approvals', function (Blueprint $table) {
            //
            $table->dropColumn('section');
            $table->dropColumn('division');
            $table->dropColumn('phone_number');

        });
    }
};
