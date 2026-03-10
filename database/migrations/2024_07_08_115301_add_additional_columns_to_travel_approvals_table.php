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
            $table->decimal('vehicle_expenses', 10, 2)->nullable()->after('activity'); // ค่าพาหนะ
            $table->decimal('fuel_expenses', 10, 2)->nullable()->after('vehicle_expenses'); // ค่าน้ำมัน
            $table->decimal('food_expenses', 10, 2)->nullable()->after('fuel_expenses'); // ค่าอาหาร
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_approvals', function (Blueprint $table) {
            //
            $table->dropColumn('vehicle_expenses'); // ลบค่าพาหนะ
            $table->dropColumn('fuel_expenses'); // ลบค่าน้ำมัน
            $table->dropColumn('food_expenses'); // ลบค่าอาหาร
        });
    }
};
