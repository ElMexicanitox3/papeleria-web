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
            $table->uuid('uuid')->unique();
            $table->foreignId('store_id')->nullable()->constrained('store')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('subcategory_id')->constrained('subcategory')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('default_product')->default(0);
            $table->string('barcode', 255)->unique();
            $table->string('model')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('deleted')->default(0);
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
