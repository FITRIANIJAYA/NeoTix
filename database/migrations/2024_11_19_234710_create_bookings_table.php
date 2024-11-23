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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ticket_id');
            $table->integer('quantity');
            $table->decimal('total_amount');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->string('booking_code')->unique();
            $table->timestamp('booking_date')->useCurrent();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->boolean('has_reviewed')->default(false);
            $table->timestamps();
            $table->index('status');

            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('ticket_id')->references('id')->on('tickets')->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
