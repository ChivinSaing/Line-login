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
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name');
            $table->string('first_name');
            $table->string('phone_number');
            $table->string('salon_name');
            $table->text('salon_address');
            $table->string('salon_website_1')->nullable();
            $table->string('salon_website_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'last_name',
                'first_name',
                'phone_number',
                'salon_name',
                'salon_address',
                'salon_website_1',
                'salon_website_2'
            ]);
        });
    }
};
