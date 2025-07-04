<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique();

            // LinkedIn Bot Settings
            $table->boolean('close_tabs')->default(false);
            $table->boolean('follow_companies')->default(false);

            // Runtime Behavior
            $table->boolean('run_non_stop')->default(false);
            $table->boolean('alternate_sortby')->default(false);
            $table->boolean('cycle_date_posted')->default(false);
            $table->boolean('stop_date_cycle_at_24hr')->default(false);

            // Resume Generator
            $table->string('generated_resume_path')->nullable();

            // Files & Logging
            $table->string('file_name')->nullable();
            $table->string('failed_file_name')->nullable();
            $table->string('logs_folder_path')->nullable();

            // Execution Settings
            $table->integer('click_gap')->nullable();
            $table->boolean('run_in_background')->default(false);

            // Performance
            $table->boolean('disable_extensions')->default(false);
            $table->boolean('safe_mode')->default(false);
            $table->boolean('smooth_scroll')->default(false);
            $table->boolean('keep_screen_awake')->default(false);

            // Advanced Settings
            $table->boolean('stealth_mode')->default(false);
            $table->boolean('showAiErrorAlerts')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_configs');
    }
};
