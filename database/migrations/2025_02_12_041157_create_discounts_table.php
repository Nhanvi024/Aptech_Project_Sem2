<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->enum('type', ['fixed', 'percent']);
            $table->integer('discount_value');
            $table->integer('quantity');
            $table->integer('condition');
            $table->integer('max_discount_value');
            $table->integer('max_uses');
            $table->boolean('status')->default(true);
            $table->text('used_by')->nullable();
            $table->dateTime('starts_at');
            $table->dateTime('expires_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
