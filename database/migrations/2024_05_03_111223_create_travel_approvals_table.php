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
        Schema::create('travel_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id'); // เชื่อมกับตาราง user
            $table->string('at')->nullable(); // คอลัมน์ชื่อของพนักงาน
            $table->string('name')->nullable(); // คอลัมน์ชื่อของพนักงาน
            $table->string('position')->nullable(); // คอลัมน์ตำแหน่ง
            $table->string('level')->nullable(); // คอลัมน์ระดับ
            $table->string('department')->nullable(); // คอลัมน์สังกัด
            $table->integer('faculty_count')->nullable(); // คอลัมน์จำนวนคณะ
            $table->integer('numberid')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('transport')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->date('vacation_start_date')->nullable();
            $table->date('vacation_end_date')->nullable();
            $table->string('budget_reference')->nullable();
            $table->string('action_plan')->nullable();
            $table->string('activity')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_approvals');
    }
};
