<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->string('feature', 100);
            $table->timestamp('created_at')->useCurrent();

            $table->index('property_id');
            $table->unique(['property_id', 'feature']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_features');
    }
};
