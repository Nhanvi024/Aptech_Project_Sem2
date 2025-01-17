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
            $table->string('proName');
            $table->decimal('proPrice', 10, 2);
            $table->decimal('proStock', 10, 2);
            $table->smallInteger('proDiscount')->default(0);
            $table->boolean('proStatus')->default(true);
            $table->string('proImageURL');
            $table->text('proDescription');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
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
