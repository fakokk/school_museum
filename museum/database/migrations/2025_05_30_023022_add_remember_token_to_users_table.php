<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRememberTokenToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('remember_token')->nullable()->after('password');
        });
    }

    public function down()
   {
       Schema::table('users', function (Blueprint $table) {
           $table->dropColumn('remember_token');
       });
   }

}
