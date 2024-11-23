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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizer_id')->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('event_date');
            $table->time('event_time');
            $table->string('location');
            $table->text('image')->nullable();
            $table->integer('quota');
            $table->decimal('price');
            $table->string('category')->nullable();
            $table->enum('status', ['draft', 'published', 'cancelled'])->default('draft');
            $table->float('average_rating')->default(0);
            $table->integer('total_reviews')->default(0);
            $table->timestamps();
            $table->index('status');
            $table->index('event_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
