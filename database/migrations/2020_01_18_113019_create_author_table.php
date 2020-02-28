<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorTable extends Migration
{
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name',100);
            $table->text('info');
            $table->string('avatar_path', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('author');
    }
}
