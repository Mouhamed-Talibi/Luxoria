<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    /*
        name
        address
        age
        phone
        email
        email_verified_at
        password
        created_at
        updated_at
        deleted_at
    */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable()->after('email');
            $table->unsignedInteger('age')->nullable()->after('address');
            $table->string('phone')->after('age');
            $table->enum('gender', ["male", "female"])->after('phone');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
