<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post1s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->text('academic');
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('file_path');
            $table->text('file_name');
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
        Schema::dropIfExists('post1s');
    }
}
