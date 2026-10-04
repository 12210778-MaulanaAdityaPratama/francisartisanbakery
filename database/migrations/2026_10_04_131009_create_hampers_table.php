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
        Schema::create('hampers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->unsignedBigInteger('price');
            $table->string('image')->nullable();
            $table->json('images')->nullable(); // Multiple images
            $table->json('contents')->nullable(); // Isi hampers
            $table->json('specifications')->nullable();
            $table->string('badge_label')->nullable();
            $table->boolean('is_available')->default(true);
            $table->boolean('is_active')->default(true);
            $table->string('whatsapp_number', 30)->default('6281234567890');
            $table->unsignedInteger('sort_order')->default(0);
            $table->text('keywords')->nullable();
            $table->index(['is_active', 'sort_order']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hampers');
    }
};