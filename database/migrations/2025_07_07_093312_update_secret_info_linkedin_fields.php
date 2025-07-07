<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('secret_infos', function (Blueprint $table) {
            $table->renameColumn('username', 'linkedin_username');
            $table->renameColumn('password', 'linkedin_password');
        });
    }

    public function down()
    {
        Schema::table('secret_infos', function (Blueprint $table) {
            $table->renameColumn('linkedin_username', 'username');
            $table->renameColumn('linkedin_password', 'password');
        });
    }
};
