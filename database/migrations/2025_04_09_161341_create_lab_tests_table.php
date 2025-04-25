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
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->decimal('price', 10, 2);
            $table->string('test_code');
            $table->string('hospital_name');
            $table->string('hospital_division');
            $table->string('hospital_district');
            $table->string('hospital_upazila');
            $table->string('hospital_union')->nullable();
            $table->string('hospital_ward')->nullable();
            $table->string('hospital_address');
            $table->string('hospital_post_code')->nullable();
            $table->string('hospital_phone')->nullable();
            $table->string('hospital_email')->nullable();
            $table->string('hospital_website')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['Active', 'In-Active'])->default('In-Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_tests');
    }
};
