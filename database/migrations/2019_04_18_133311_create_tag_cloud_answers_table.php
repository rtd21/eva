<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagCloudAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_cloud_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer');
            $table->bigInteger('tag_cloud_id')->unsigned()->nullable();
            $table->foreign('tag_cloud_id')
                ->references('id')
                ->on('tag_clouds')
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
        Schema::dropIfExists('tag_cloud_answers');
    }
}
