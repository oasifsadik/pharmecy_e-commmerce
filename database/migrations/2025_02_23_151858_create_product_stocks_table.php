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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->integer('product_quantity');
            $table->integer('inner_packet')->nullable();
            $table->integer('single_unit')->nullable();
            $table->integer('bottle_size')->nullable();
            $table->string('manufacture_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->decimal('buying_price',8,2);
            $table->decimal('selling_price',8,2);
            $table->decimal('inner_packet_price',8,2)->nullable();
            $table->decimal('single_unit_price',8,2)->nullable();
            $table->decimal('discount_price',8,2)->nullable();
            $table->enum('discount_type',['TK','Percentages'])->nullable();
            $table->decimal('discount_value',8,2)->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stocks');
    }
};
