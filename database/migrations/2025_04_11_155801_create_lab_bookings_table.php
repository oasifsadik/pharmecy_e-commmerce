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
        Schema::create('lab_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lab_test_id');
            $table->string('name')->nullable();
            $table->string('email', 30)->nullable();
            $table->string('phone', 20)->nullable();
            $table->double('amount')->nullable();
            $table->text('address')->nullable();
            $table->date('test_date');
            $table->enum('status', ['Pending', 'Paid'])->default('Pending');
            $table->string('transaction_id')->nullable();
            $table->string('currency', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_bookings');
    }
};
