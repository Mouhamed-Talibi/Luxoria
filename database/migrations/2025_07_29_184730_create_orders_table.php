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
        Schema::table('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'delivered', 'cancelled'])->default('pending');
            $table->integer('quantity')->default(1);
            $table->decimal('total_price', 10, 2);
            $table->string('address');
            $table->string('product_name');
            $table->integer('product_id')->unsigned();
            $table->string('customer_name')->nullable();
            $table->integer('phone_number');
            $table->timestamps();
            $table->softDeletes();
            // This will create a foreign key constraint to the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
