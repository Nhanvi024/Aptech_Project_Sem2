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
            $table->id();
            // $table->foreignId('userId')->unique()->constrained('users', 'id')->onDelete('cascade');
            $table->smallInteger('userId')->nullable()->default(null);
            $table->string('orderName')->nullable()->default(null);
            $table->string('orderEmail')->nullable()->default(null);
            $table->string('orderPhone');
            $table->string('orderAddress')->nullable()->default(null);
            $table->string('shippingName');
            $table->string('shippingPhone');
            $table->string('shippingAddress');
            $table->text('itemsList')->nullable()->default(null);
            $table->text('note')->nullable()->default(null);
            $table->decimal('totalCost', 15, 2);
            $table->decimal('shipping', 15, 2);
            $table->decimal('finalPrice', 15, 2);
            $table->string('discountCode')->nullable()->default(null);
            $table->tinyInteger('status')->default(0);
            $table->timestamp('orderDate');
            $table->timestamp('deliveryDate')->nullable()->default(null);
            $table->string('payment_id', 20);
            $table->tinyInteger('invoiceStatus')->default(0);
            $table->timestamps();
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
