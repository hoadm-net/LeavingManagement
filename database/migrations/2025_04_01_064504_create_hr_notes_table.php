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
        Schema::create('hr_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->unsignedBigInteger('user_id'); // Gắn với nhân viên
            $table->integer('total_days'); // Tổng số ngày phép năm
            $table->integer('used_days'); // Số ngày đã sử dụng
            $table->integer('remaining_days'); // Số ngày còn lại

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hr_notes');
    }
};
