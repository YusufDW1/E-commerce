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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // BIGINT, UNSIGNED, PRIMARY KEY, AUTO_INCREMENT
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // FOREIGN KEY mengacu pada kolom id tabel orders
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // FOREIGN KEY mengacu pada kolom id tabel products
            $table->integer('quantity')->unsigned()->default(1); // INTEGER, UNSIGNED, DEFAULT 1
            $table->decimal('unit_price', 10, 2); // DECIMAL(10, 2), NOT NULL
            $table->decimal('subtotal', 10, 2); // DECIMAL(10, 2), NOT NULL
            $table->timestamps(); // created_at dan updated_at (TIMESTAMP, NULLABLE)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
