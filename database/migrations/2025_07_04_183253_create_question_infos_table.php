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
        Schema::create('question_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique();

            $table->string('default_resume_path')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->string('require_visa')->nullable();
            $table->string('website')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('us_citizenship')->nullable();

            $table->bigInteger('desired_salary')->nullable();
            $table->bigInteger('current_ctc')->nullable();
            $table->integer('notice_period')->nullable();

            $table->string('linkedin_headline')->nullable();
            $table->text('linkedin_summary')->nullable();
            $table->text('cover_letter')->nullable();
            $table->text('user_information_all')->nullable();
            $table->string('recent_employer')->nullable();
            $table->string('confidence_level')->nullable(); // intentionally string to allow "8", "8.5", "high"

            $table->boolean('pause_before_submit')->default(false);
            $table->boolean('pause_at_failed_question')->default(false);
            $table->boolean('overwrite_previous_answers')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_infos');
    }
};
