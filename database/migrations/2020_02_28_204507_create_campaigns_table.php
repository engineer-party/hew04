<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->unsignedBigInteger('music_id');
            $table->string('name');
            $table->string('content');
            $table->integer('discount');
            $table->dateTime('end_date_time');
            $table->timestamps();

            $table->primary('music_id');

            $table->foreign('music_id')
                ->references('id')
                ->on('musics')
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
        Schema::dropIfExists('campaigns');
    }
}
