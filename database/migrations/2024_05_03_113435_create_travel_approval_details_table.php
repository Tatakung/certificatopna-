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
        Schema::create('travel_approval_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travel_approval_id');
            $table->string('faculty_member_name')->nullable();
            $table->string('faculty_member_position')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('travel_approval_id')->references('id')->on('travel_approvals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_approval_details');
    }
};
