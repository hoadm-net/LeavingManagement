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
        Schema::create('leavings', function (Blueprint $table) {
            $table->id();

            // Basic info
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('position');
            $table->string('shift');
            $table->foreignId('department_id')->constrained('departments');
            $table->unsignedInteger('leave_days');
            $table->dateTime('from');
            $table->dateTime('to');

            // Company pay
            $table->unsignedInteger('paid_leave')->default(0);
            $table->string('reason_company_pay')->nullable();
            $table->unsignedInteger('child_under_12')->default(0);

            // Paid personal leave (số ngày)
            $table->unsignedInteger('self_marriage')->default(0);
            $table->unsignedInteger('child_marriage')->default(0);
            $table->unsignedInteger('grand_funeral')->default(0);
            $table->unsignedInteger('parent_funeral')->default(0);

            // Social insurance pay
            $table->unsignedInteger('pregnancy_check')->default(0);
            $table->unsignedInteger('maternity_leave')->default(0);
            $table->unsignedInteger('paternity_leave')->default(0);
            $table->unsignedInteger('other_insurance_leave')->default(0);
            $table->string('reason_insurance')->nullable();
            $table->unsignedInteger('sick_leave')->default(0);
            $table->unsignedInteger('child_sick_leave')->default(0);

            // Unpaid
            $table->string('unpaid_reason')->nullable();

            // Emergency contact as phone number
            $table->string('emergency_contact');

            // Meta data
            $table->integer('current_manager')->default(1);
            $table->enum('status', ['pending', 'processing', 'approved', 'rejected'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leavings');
    }
};
