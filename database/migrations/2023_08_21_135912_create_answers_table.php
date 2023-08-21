<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('survey_id')->references('id')->on('surveys')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('detail_id');
            $table->foreign('detail_id')->references('id')->on('seminar_details')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('answer01')->nullable();
            $table->string('answer02')->nullable();
            $table->string('answer03')->nullable();
            $table->string('answer04')->nullable();
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
        Schema::dropIfExists('answers');
    }
}
