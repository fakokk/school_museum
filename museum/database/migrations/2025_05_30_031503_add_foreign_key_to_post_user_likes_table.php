<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPostUserLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_user_like', function (Blueprint $table) {
            // Добавление внешнего ключа
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('post_user_like', function (Blueprint $table) {
            // Удаление внешнего ключа
            $table->dropForeign(['user_id']);
        });
    }
}
