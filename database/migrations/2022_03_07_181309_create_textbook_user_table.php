<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextbookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textbook_user', function (Blueprint $table) {
            $table->unsignedBigInteger('textbook_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('textbook_id')->references('id')->on('textbooks');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->primary(['textbook_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('textbook_user');
    }
}
