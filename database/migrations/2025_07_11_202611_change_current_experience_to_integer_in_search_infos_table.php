<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('search_infos', function (Blueprint $table) {
            $table->integer('current_experience')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('search_infos', function (Blueprint $table) {
            $table->string('current_experience')->nullable()->change();
        });
    }
};
