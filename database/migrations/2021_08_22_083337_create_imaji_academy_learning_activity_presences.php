<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImajiAcademyLearningActivityPresences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features_activity_presences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iaf_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('iaf_id')
                ->references('id')
                ->on('imaji_academy_features')
                ->onDelete('restrict')
                ->cascadeOnUpdate();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('imaji_academy_learning_activity_presences');
    }
}
