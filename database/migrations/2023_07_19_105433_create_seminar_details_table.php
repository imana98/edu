<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminar_id')
            ->constrained('seminars')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('owner_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('title');
            $table->text('descriptions');
            $table->string('filename');
            $table->boolean('is_opening');
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
        Schema::dropIfExists('seminar_details');
    }
}
