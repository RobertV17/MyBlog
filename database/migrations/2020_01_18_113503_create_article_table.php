<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('cat_id')->unsigned();
            $table->string('title', 255);
            $table->string('preview_img', 255);
            $table->text('description', 500);
            $table->text('text');
        });

        Schema::table('article', function (Blueprint $table) {
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('article');
    }
}
