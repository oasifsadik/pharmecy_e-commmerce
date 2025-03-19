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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cat_id');
            $table->bigInteger('brand_id');
            $table->string('product_slug');
            $table->string('product_name');
            $table->string('generic_name')->nullable();
            $table->longText('side_effects')->nullable();
            $table->enum('action',['Active','In-Active'])->default('In-Active');
            $table->enum('medicine_type',['tablet','medical-accessories','bottle','general'])->default('general');
            $table->longText('description')->nullable();
            $table->string('thumbnail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
