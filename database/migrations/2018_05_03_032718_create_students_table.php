<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->integer('student_id');
            $table->integer('identification');
            $table->string('faculty', 100);
            $table->string('emphasis', 100)->nullable();
            $table->string('nationality', 80)->nullable();
            $table->string('religion', 5)->nullable();
            $table->string('status', 2)->nullable();
            $table->string('gender', 2)->nullable();
            $table->integer('age')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('cellnumber', 100)->nullable();
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
        Schema::dropIfExists('students');
    }
}
