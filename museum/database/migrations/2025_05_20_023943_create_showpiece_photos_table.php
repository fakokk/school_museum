<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowpiecePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showpiece_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('showpiece_id')->constrained('showpiece'); // Связь с таблицей экспонатов
            $table->string('url'); // Поле для URL фото
            $table->timestamps();
            $table->foreign('showpiece_id')->references('id')->on('showpiece')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('showpiece_photos');
    }

}
