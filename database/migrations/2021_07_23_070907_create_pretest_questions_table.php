<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePretestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pretest_questions', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->unsignedBigInteger('pretest_aspect_id');
            $table->integer('question_type');
            $table->integer('answer')->nullable();
            $table->timestamps();
            $table->foreign('pretest_aspect_id')
                ->references('id')
                ->on('pretest_aspects')
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
        Schema::dropIfExists('questions');
    }
}
