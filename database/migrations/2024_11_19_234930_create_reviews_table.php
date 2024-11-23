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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');
            $table->foreignId('user_id')->constrained('users', 'id')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('event_id')->constrained('events', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('booking_id')->unique()->constrained('bookings', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('rating');
            $table->text('review_text')->nullable();
            $table->boolean('is_verified_attendee')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            $table->index('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
