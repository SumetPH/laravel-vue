<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post2s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->text('file3name')->nullable();
            $table->text('file3path')->nullable();
            $table->text('file4name')->nullable();
            $table->text('file4path')->nullable();
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
        Schema::dropIfExists('post2s');
    }
}
