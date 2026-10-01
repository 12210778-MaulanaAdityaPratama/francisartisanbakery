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
        Schema::create('menu_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category', 50)->index();
            $table->string('category_label');
            $table->text('description');
            $table->unsignedBigInteger('price');
            $table->string('badge_label')->nullable();
            $table->boolean('is_available')->default(true);
            $table->string('image')->nullable();
            $table->json('specifications')->nullable();
            $table->json('details')->nullable();
            $table->text('keywords')->nullable();
            $table->string('whatsapp_number', 30)->default('6281234567890');
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->index(['is_active', 'sort_order']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_products');
    }
};
