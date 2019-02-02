<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post3s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->text('status'); 
            $table->text('file1name')->nullable();
            $table->text('file1path')->nullable();
            $table->string('file1status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file2name')->nullable();
            $table->text('file2path')->nullable();
            $table->string('file2status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file3name')->nullable();
            $table->text('file3path')->nullable();
            $table->string('file3status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file4name')->nullable();
            $table->text('file4path')->nullable();
            $table->string('file4status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file5name')->nullable();
            $table->text('file5path')->nullable();
            $table->string('file5status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file6name')->nullable();
            $table->text('file6path')->nullable();
            $table->string('file6status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file7name')->nullable();
            $table->text('file7path')->nullable();
            $table->string('file7status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file8name')->nullable();
            $table->text('file8path')->nullable();
            $table->string('file8status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file9name')->nullable();
            $table->text('file9path')->nullable();
            $table->string('file9status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file10name')->nullable();
            $table->text('file10path')->nullable();
            $table->string('file10status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file11name')->nullable();
            $table->text('file11path')->nullable();
            $table->string('file11status')->default('ยังไม่ได้รับการตรวจสอบ');
            $table->text('file12name')->nullable();
            $table->text('file12path')->nullable();
            $table->string('file12status')->default('ยังไม่ได้รับการตรวจสอบ');
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
        Schema::dropIfExists('post3s');
    }
}
