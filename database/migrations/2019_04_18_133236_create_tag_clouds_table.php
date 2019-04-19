<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagCloudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_clouds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->boolean('voting_open')->default(false);
            $table->boolean('results_visible')->default(false);
            $table->boolean('activate_poll')->default(false);
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
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
        Schema::dropIfExists('tag_clouds');
    }
}
