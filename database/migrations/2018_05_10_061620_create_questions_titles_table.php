<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_titles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('titles_id');
            $table->unsignedInteger('questions_id');
            $table->timestamps();

            $table->foreign('titles_id')->references('id')->on('titles');
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
        Schema::dropIfExists('questions_titles');
    }
}
