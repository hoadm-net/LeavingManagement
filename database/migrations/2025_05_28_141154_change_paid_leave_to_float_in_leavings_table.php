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
        Schema::table('leavings', function (Blueprint $table) {
            $table->decimal('leave_days', 8, 2)->unsigned()->default(0)->change();
            $table->decimal('paid_leave', 8, 2)->unsigned()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leavings', function (Blueprint $table) {
            $table->unsignedInteger('leave_days')->default(0)->change();
            $table->unsignedInteger('paid_leave')->default(0)->change();
        });
    }
};
