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
        Schema::create('price_history', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('store')->constrained('store')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('iva')->constrained('iva_history')->onDelete('cascade')->onUpdate('cascade');
            $table->double('original_price');
            $table->boolean('has_iva')->default(0);
            $table->double('price');
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
        Schema::dropIfExists('price_history');
    }
};
