<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('titles_id');
            $table->string('titleDescription');
            $table->text('description');
            $table->text('instruction');
//            $table->date('start');
//            $table->date('end');
            $table->unsignedInteger('quarters_id');
            $table->enum('isClose', ['false', 'true'])->default('false');
            $table->enum('isTemplate', ['false', 'true'])->default('false');
            $table->timestamps();

            $table->foreign('titles_id')->references('id')->on('titles');
            $table->foreign('quarters_id')->references('id')->on('quarters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls');
    }
}
