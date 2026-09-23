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
        Schema::create('product_variations', function (Blueprint $table) {
    $table->id();

    $table->foreignId('product_id')
        ->constrained('products')
        ->cascadeOnDelete();

    $table->foreignId('size_id')
        ->constrained('product_sizes')
        ->cascadeOnDelete();

    $table->foreignId('color_id')
        ->constrained('product_colors')
        ->cascadeOnDelete();

    $table->string('sku')->unique();
    $table->decimal('price', 10, 2)->nullable();
    $table->integer('stock')->default(0);
    $table->boolean('status')->default(1);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variations');
    }
};
