<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->text('content');

            $table->integer('created_by')->unsigned(); // column definition
            $table->foreign('created_by')->references('id')->on('users'); // foreign key definition

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('posts');
    }
}
