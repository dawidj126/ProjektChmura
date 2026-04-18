<?php

use App\Enums\FurnishingType;
use App\Enums\PropertyStatus;
use App\Enums\PropertyType;
use App\Enums\RentalPeriod;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->enum('property_type', array_column(PropertyType::cases(), 'value'));
            $table->enum('status', array_column(PropertyStatus::cases(), 'value'))->default(PropertyStatus::Draft->value);

            // Dane podstawowe
            $table->string('title');
            $table->string('slug', 300)->unique();
            $table->string('short_description', 500)->nullable();
            $table->longText('description')->nullable();

            // Lokalizacja
            $table->string('voivodeship', 100);
            $table->string('city', 100);
            $table->string('district', 100)->nullable();
            $table->string('street', 200)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Parametry wspólne
            $table->decimal('area', 8, 2)->nullable();
            $table->unsignedTinyInteger('rooms_count')->nullable();
            $table->unsignedTinyInteger('bathrooms_count')->nullable();
            $table->tinyInteger('floor')->nullable();
            $table->unsignedTinyInteger('total_floors')->nullable();
            $table->enum('furnishing', array_column(FurnishingType::cases(), 'value'))->nullable();
            $table->unsignedSmallInteger('year_built')->nullable();
            $table->boolean('parking')->default(false);
            $table->boolean('elevator')->default(false);
            $table->boolean('balcony')->default(false);

            // Parametry tylko dla pokoju
            $table->decimal('room_area', 8, 2)->nullable();
            $table->decimal('apartment_area', 8, 2)->nullable();
            $table->unsignedTinyInteger('roommates_count')->nullable();
            $table->unsignedTinyInteger('total_rooms_count')->nullable();

            // Cena i opłaty
            $table->decimal('price', 10, 2);
            $table->decimal('admin_fee', 10, 2)->nullable();
            $table->decimal('deposit', 10, 2)->nullable();
            $table->text('additional_costs')->nullable();

            // Zasady najmu
            $table->enum('rental_period', array_column(RentalPeriod::cases(), 'value'))->nullable();
            $table->date('available_from')->nullable();
            $table->unsignedTinyInteger('min_rental_months')->nullable();

            // Preferencje najemcy
            $table->boolean('pets_allowed')->default(false);
            $table->boolean('smoking_allowed')->default(false);
            $table->boolean('students_allowed')->default(true);
            $table->boolean('only_women')->default(false);
            $table->boolean('only_men')->default(false);

            // Dodatkowe
            $table->text('rules')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('main_image_id')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 500)->nullable();

            // Liczniki
            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('favorites_count')->default(0);

            // Publikacja
            $table->timestamp('published_at')->nullable();
            $table->text('rejected_reason')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index('status');
            $table->index('property_type');
            $table->index('city');
            $table->index('voivodeship');
            $table->index('price');
            $table->index('published_at');
            $table->index(['status', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
