<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStream1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream1s', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('channel_id')->unsigned();
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');
            $table->string('video_pid')->default("off");
            $table->string('video_codec')->default("h264");
            $table->bigInteger('video_bitrate')->default(3000);
            $table->string('codec_profile')->default("Baseline");
            $table->string('codec_speed')->default("veryslow");
            $table->decimal('frame_rate')->default(1);
            $table->string('height')->default(720);
            $table->string('width')->default(576);
            $table->integer('keyframe')->default(0);
            $table->string('audio_pid')->default("off");
            $table->string('audio_codec')->default("MPEG1/L2");
            $table->bigInteger('sample_rate')->default(8000);
            $table->bigInteger('audio_bitrate')->default(128);
            $table->string('subtitle_pid')->default("off");
            $table->string('subtitle_method')->default("Burn");
            $table->string('cabac')->default('off');
            $table->string('scenecut')->default('off');
            $table->string('cbr')->default('off');
            $table->string('deinterlace')->default('off');
            $table->integer('numberBFrames')->default(0);
            $table->integer('mode')->default(0);
            $table->integer('parity')->default(0);
            $table->integer('deint')->default(0);

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stream1s');
    }
}
