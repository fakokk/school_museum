<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowpieceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showpiece', function (Blueprint $table) {
                $table->id(); // Поле id
                $table->text('title'); // Поле для описания
                $table->text('content'); // Поле для описания
                $table->unsignedBigInteger('category_id')->nullable();

                $table->timestamps(); // Поля created_at и updated_at
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showpiece');
    }
}
