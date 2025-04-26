<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->integer('payment_method')->default(0);
            $table->integer('payment_status')->default(0);
            $table->foreignUuid('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->integer('subtotal')->default(0);
            $table->integer('total_price')->default(0);
            $table->integer('shipping_cost')->default(0);
            $table->integer('price')->default(0);
            $table->longText('description')->nullable();
            $table->text('address')->nullable();
            $table->string('custom_design')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
