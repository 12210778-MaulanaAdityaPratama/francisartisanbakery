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
        Schema::create('bread_cares', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->index(); // Storage, Reheating, Freezing, etc.
            $table->string('icon')->nullable(); // Icon name or emoji
            $table->text('description');
            $table->longText('content');
            $table->json('tips')->nullable(); // Array of tips
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->index(['is_active', 'category', 'sort_order']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bread_cares');
    }
};