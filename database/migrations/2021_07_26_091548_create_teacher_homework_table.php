<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_homework', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_name_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->string('subject');
            $table->string('name');
            $table->string('description');
            $table->date('deadline');
            $table->string('file_path');
            $table->timestamps();
            $table->foreign('class_name_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade');
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
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
        Schema::dropIfExists('teacher_homework');
    }
}
