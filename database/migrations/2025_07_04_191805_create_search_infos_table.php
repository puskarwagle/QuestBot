<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('search_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique();

            $table->json('search_terms')->nullable();
            $table->string('search_location')->nullable();
            $table->string('switch_number')->nullable();
            $table->boolean('randomize_search_order')->default(false);

            $table->string('sort_by')->nullable();
            $table->string('date_posted')->nullable();
            $table->string('salary')->nullable();

            $table->boolean('easy_apply_only')->default(false);
            $table->json('experience_level')->nullable();
            $table->json('job_type')->nullable();
            $table->json('on_site')->nullable();
            $table->json('companies')->nullable();

            $table->boolean('under_10_applicants')->default(false);
            $table->boolean('in_your_network')->default(false);
            $table->boolean('fair_chance_employer')->default(false);

            $table->json('about_company_bad_words')->nullable();
            $table->json('about_company_good_words')->nullable();
            $table->json('bad_words')->nullable();

            $table->boolean('security_clearance')->default(false);
            $table->boolean('did_masters')->default(false);

            $table->string('current_experience')->nullable();
            $table->boolean('pause_after_filters')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('search_infos');
    }
};
