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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            // Relationship with users table
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // username
            $table->string('username')->nullable();

            // Testimonial content
            $table->text('content');

            // Rating from 1 to 5 stars
            $table->unsignedTinyInteger('rating')->default(5)->comment('1 to 5 stars');

            // Status for moderation
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->timestamps();

            // Indexes for faster queries
            $table->index('status');
            $table->index('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
