<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->mediumText('description');
            $table->mediumText('condition');
            $table->integer('creation_y');
            $table->string('dimensions');
            $table->string('color');
            $table->integer('style_id');
            $table->integer('era_id');
            $table->string('artist');
            $table->string('country');
            $table->integer('birth');
            $table->integer('death');
            $table->integer('price');
            $table->boolean('sold');
            $table->integer('sold_for');
            $table->date('ending');


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::drop('arts');
    }
}
