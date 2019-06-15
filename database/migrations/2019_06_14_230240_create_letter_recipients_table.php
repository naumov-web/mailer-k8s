<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_recipients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('letter_id');
            $table->unsignedBigInteger('recipient_id');
            $table->timestamps();
        });

        Schema::table('letter_recipients', function (Blueprint $table) {

            $table->foreign('letter_id')->references('id')->on('letters');
            $table->foreign('recipient_id')->references('id')->on('recipients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('letter_recipients', function (Blueprint $table) {

            $table->dropForeign(['letter_id']);
            $table->dropForeign(['recipient_id']);

        });

        Schema::dropIfExists('letter_recipients');
    }
}
