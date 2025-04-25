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
        Schema::create('ambulances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_number');
            $table->string('vehicle_number')->unique();
            $table->string('driver_name');
            $table->string('driver_contact');
            $table->string('location');
            $table->enum('availability', ['Available', 'Busy', 'Inactive'])->default('Available');
            $table->enum('status', ['Active', 'In-Active'])->default('In-Active');
            $table->decimal('price_per_km', 8, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulances');
    }
};
