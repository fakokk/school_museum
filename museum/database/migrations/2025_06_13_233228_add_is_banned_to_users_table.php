<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsBannedToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_banned')->default(false)->after('remember_token');
            $table->timestamp('banned_at')->nullable()->after('is_banned');
        });
    }
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
