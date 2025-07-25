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
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name', 50)->unique();
                $table->string('slug', 100)->unique();
                $table->text('description');
                $table->string('image')->nullable();
                $table->unsignedInteger('total_products')->default(0);
                $table->timestamps();
                $table->softDeletes();
                $table->index('slug');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('categories');
        }
    };
