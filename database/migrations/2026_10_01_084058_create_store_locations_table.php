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
        Schema::create('store_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('area', 100)->index();
            $table->string('type_label', 100);
            $table->text('address');
            $table->string('operating_hours', 150);
            $table->string('phone', 40);
            $table->string('whatsapp_number', 30);
            $table->text('maps_url');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->json('facilities')->nullable();
            $table->text('keywords')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_flagship')->default(false);
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
        Schema::dropIfExists('store_locations');
    }
};
