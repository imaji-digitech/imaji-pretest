<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImajiAcademyFeatureTestStudentScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_test_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iaf_test_id');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('imaji_academy_feature_test_student_scores');
    }
}
