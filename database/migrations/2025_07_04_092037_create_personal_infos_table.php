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
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique();
            $table->unique('user_id');
            // Legal name
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            // Contact
            $table->string('phone_number');
            $table->string('current_city')->nullable();

            // Address
            $table->string('street')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();

            // Equal Opportunity (optional)
            $table->string('ethnicity')->nullable();
            $table->string('gender')->nullable();
            $table->string('disability_status')->nullable();
            $table->string('veteran_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_infos');
    }
};
