<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeEntryAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_entry_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer');
            $table->bigInteger('free_entry_id')->unsigned()->nullable();
            $table->foreign('free_entry_id')
                ->references('id')
                ->on('free_entries')
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
        Schema::dropIfExists('free_entry_answers');
    }
}
