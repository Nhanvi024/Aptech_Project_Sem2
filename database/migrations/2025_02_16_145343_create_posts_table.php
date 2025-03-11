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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('author')->nullable()->after('id');
            $table->foreignId('author')->constrained('admins')->onDelete('cascade');
            $table->foreignId('category')->constrained('categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->json('content')->nullable();
            $table->string('post_featured_image')->nullable();
            $table->json('content_image')-> nullable();
            $table->string('tags')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('visibility')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
