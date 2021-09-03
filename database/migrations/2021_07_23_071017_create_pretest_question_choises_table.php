<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePretestQuestionChoisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pretest_question_choices', function (Blueprint $table) {
            $table->id();
            $table->text('answer');
            $table->unsignedBigInteger('pretest_question_id');
            $table->integer('score');
            $table->timestamps();
            $table->foreign('pretest_question_id')
                ->references('id')
                ->on('pretest_questions')
                ->onDelete('restrict')
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_choises');
    }
}
