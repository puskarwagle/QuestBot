<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('secret_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique();

            // LinkedIn login
            $table->string('username')->nullable();
            $table->string('password')->nullable();

            // AI config
            $table->boolean('use_AI')->default(false);
            $table->string('ai_provider')->nullable();

            // DeepSeek config
            $table->string('deepseek_api_url')->nullable();
            $table->string('deepseek_api_key')->nullable();
            $table->string('deepseek_model')->nullable();

            // Local/OpenAI LLM
            $table->string('llm_api_url')->nullable();
            $table->string('llm_api_key')->nullable();
            $table->string('llm_model')->nullable();

            $table->string('llm_spec')->nullable();
            $table->boolean('stream_output')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('secret_infos');
    }
};
