<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_question', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id');
            $table->unsignedInteger('questions_id');
            $table->timestamps();

            $table->foreign('items_id')->references('id')->on('items');
            $table->foreign('questions_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_question');
    }
}
