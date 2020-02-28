<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('art_id')->unsigned();
            $table->string('author', 100);
            $table->string('email', 100);
            $table->string('text');
            $table->boolean('moderated')->default(0);
        });

        Schema::table('comment', function (Blueprint $table) {
            $table->foreign('art_id')->references('id')->on('article');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
