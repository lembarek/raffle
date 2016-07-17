<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_question_answer', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('raffle_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('question_answer_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('raffle_id')
                  ->references('id')->on('raffles')
                  ->onDelete('cascade');

            $table->foreign('question_id')
                  ->references('id')->on('questions')
                  ->onDelete('cascade');

            $table->foreign('question_answer_id')
                  ->references('id')->on('answers')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

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
        Schema::drop('user_question_answer');
    }
}
