<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeminarDetailsTable3columns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seminar_details', function (Blueprint $table) {
            $table->string('seminar_name')->after('speaker_id');
            $table->string('target')->after('seminar_name');
            $table->string('date')->after('filename');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seminar_details', function (Blueprint $table) {
            //
        });
    }
}
