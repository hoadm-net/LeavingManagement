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
        Schema::create('ticket_approval_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leaving_id')->constrained('leavings')->onDelete('cascade'); // Thay 'leavings' bằng bảng liên quan
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('action', ['approved', 'rejected'])->default('approved');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_approval_history');
    }
};
