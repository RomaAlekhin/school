<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_lesson', function (Blueprint $table) {

            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('status_id');

            $table->foreign('lesson_id')->references('id')->on('lessons')
                ->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade');

            $table->unique(['lesson_id', 'student_id']);

            $table->foreign('status_id')->references('id')->on('statuses');

            $table->tinyInteger('behaviour')->nullable();
            $table->tinyInteger('activity')->nullable();
            $table->tinyInteger('homework')->nullable();
            $table->tinyInteger('knowledge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_lesson');
    }
}
