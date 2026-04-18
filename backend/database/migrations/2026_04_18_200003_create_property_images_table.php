<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->string('path', 500);
            $table->string('filename');
            $table->unsignedTinyInteger('order')->default(0);
            $table->boolean('is_main')->default(false);
            $table->timestamps();

            $table->index('property_id');
            $table->index(['property_id', 'order']);
        });

        Schema::table('properties', function (Blueprint $table) {
            $table->foreign('main_image_id')
                  ->references('id')
                  ->on('property_images')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign(['main_image_id']);
        });
        Schema::dropIfExists('property_images');
    }
};
