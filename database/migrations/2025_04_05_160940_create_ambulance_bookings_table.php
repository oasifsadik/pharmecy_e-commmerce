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
        Schema::create('ambulance_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('ambulance_id');
            $table->string('contact_number');
            $table->string('pickup_location');
            $table->string('drop_location');
            $table->dateTime('pickup_time');
            $table->decimal('distance', 8, 2)->nullable(); // in km
            $table->decimal('price', 10, 2)->nullable(); // total cost
            $table->enum('status', ['Pending', 'Confi   rmed', 'Working','Completed', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulance_bookings');
    }
};
