<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowpieceTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showpiece_tags', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('showpiece_id');
            $table->unsignedBigInteger('tag_id');

            $table->timestamps();
            //idx
            $table->index('showpiece_id', 'showpiece_tag_showpiece_idx');
            $table->index('tag_id', 'showpiece_tag_tag_idx');

            //fk
            $table->foreign('showpiece_id', 'showpiece_tag_showpiece__fk')->on('showpiece')->references('id');
            $table->foreign('tag_id', 'showpiece_tag_tag_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showpiece_tags');
    }
}
