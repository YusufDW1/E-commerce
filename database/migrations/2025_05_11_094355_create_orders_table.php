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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // BIGINT, UNSIGNED, PRIMARY KEY, AUTO_INCREMENT
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // FOREIGN KEY mengacu pada kolom id tabel customers
            $table->date('order_date'); // DATE, NOT NULL
            $table->decimal('total_amount', 10, 2)->default(0.00); // DECIMAL(10, 2), NOT NULL, DEFAULT 0.00
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending'); // ENUM, NOT NULL, DEFAULT 'pending'
            $table->timestamps(); // created_at dan updated_at (TIMESTAMP, NULLABLE)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
