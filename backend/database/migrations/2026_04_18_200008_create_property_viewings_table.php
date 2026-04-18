<?php

use App\Enums\ViewingStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_viewings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete();
            $table->dateTime('proposed_at');
            $table->enum('status', array_column(ViewingStatus::cases(), 'value'))->default(ViewingStatus::Pending->value);
            $table->text('note')->nullable();
            $table->text('owner_note')->nullable();
            $table->timestamps();

            $table->index('property_id');
            $table->index('user_id');
            $table->index('owner_id');
            $table->index('status');
            $table->index('proposed_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_viewings');
    }
};
