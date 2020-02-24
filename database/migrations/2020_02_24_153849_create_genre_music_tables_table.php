<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreMusicTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_music_tables', function (Blueprint $table) {
            $table->unsignedBigInteger('music_id');
            $table->unsignedBigInteger('genre_id');
            $table->primary(['music_id', 'genre_id']);
            $table->timestamps();

            //外部キー制約
            $table->foreign('music_id')
                ->references('id')
                ->on('musics')
                ->onDelete('cascade');
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_music_tables');
    }
}
