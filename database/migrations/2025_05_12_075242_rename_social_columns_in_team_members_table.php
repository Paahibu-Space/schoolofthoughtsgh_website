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
        Schema::table('team_members', function (Blueprint $table) {
            $table->renameColumn('twitter_url', 'x_url');
            $table->renameColumn('github_url', 'facebook_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->renameColumn('x_url', 'twitter_url');
            $table->renameColumn('facebook_url', 'github_url');
        });
    }
};
