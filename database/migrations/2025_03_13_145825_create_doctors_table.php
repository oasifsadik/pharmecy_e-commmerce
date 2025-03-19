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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('dob');
            $table->string('state');
            $table->integer('experience');
            $table->string('specialization');
            $table->string('license_number')->unique();
            $table->string('clinic_name')->nullable();
            $table->string('clinic_address')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('profile_picture');
            $table->string('password');
            $table->enum('status',['Pending','Approved','Reject'])->default('Pending');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
