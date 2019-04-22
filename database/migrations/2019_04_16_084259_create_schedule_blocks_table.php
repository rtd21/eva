<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->time('time');
            $table->integer('day');
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->bigInteger('speaker_id')->unsigned()->nullable();
            $table->foreign('speaker_id')
                ->references('id')->on('speakers')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_blocks');
    }
}
