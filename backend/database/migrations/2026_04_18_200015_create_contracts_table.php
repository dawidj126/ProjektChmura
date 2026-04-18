<?php

use App\Enums\ContractStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('users')->cascadeOnDelete();
            $table->enum('status', array_column(ContractStatus::cases(), 'value'))->default(ContractStatus::Draft->value);

            // Snapshot danych
            $table->string('owner_name')->nullable();
            $table->text('owner_address')->nullable();
            $table->string('owner_id_number', 50)->nullable();
            $table->string('tenant_name')->nullable();
            $table->text('tenant_address')->nullable();
            $table->string('tenant_id_number', 50)->nullable();
            $table->text('property_address')->nullable();
            $table->string('property_type', 50)->nullable();
            $table->decimal('rental_price', 10, 2)->nullable();
            $table->decimal('deposit_amount', 10, 2)->nullable();
            $table->decimal('admin_fee', 10, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedTinyInteger('rental_months')->nullable();
            $table->text('conditions')->nullable();

            $table->string('pdf_path', 500)->nullable();
            $table->timestamp('generated_at')->nullable();
            $table->timestamps();

            $table->index('property_id');
            $table->index('owner_id');
            $table->index('tenant_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
