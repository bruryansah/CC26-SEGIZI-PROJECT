<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('ingredients'); // JSON array
            $table->text('instructions'); // JSON array step-by-step
            $table->string('image')->nullable();
            $table->integer('prep_time'); // menit
            $table->integer('cook_time'); // menit
            $table->integer('servings');

            // Nutrition per serving (gram)
            $table->decimal('calories', 8, 2);
            $table->decimal('protein', 8, 2);
            $table->decimal('carbs', 8, 2);
            $table->decimal('fat', 8, 2);
            $table->decimal('fiber', 8, 2)->nullable();
            $table->decimal('sugar', 8, 2)->nullable();
            $table->decimal('sodium', 8, 2)->nullable(); // mg

            // Tags & Categories
            $table->json('tags'); // ['vegan', 'high-protein', 'gluten-free']
            $table->string('difficulty')->default('medium'); // easy, medium, hard
            $table->string('meal_type'); // breakfast, lunch, dinner, snack

            // Metadata
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // author
            $table->boolean('is_published')->default(true);
            $table->integer('view_count')->default(0);
            $table->decimal('rating_avg', 2, 1)->default(0);
            $table->integer('rating_count')->default(0);

            $table->timestamps();

            // Indexes untuk filter
            $table->index(['is_published', 'meal_type']);
            $table->index('calories');
            $table->index('protein');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
