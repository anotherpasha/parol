<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('slider_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slider_id')->unsigned();
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_fullpath');
            $table->integer('order')->default(0);

            $table->foreign('slider_id')
                ->references('id')
                ->on('sliders')
                ->onDelete('cascade');
        });

        Schema::create('slider_image_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slider_image_id')->unsigned();
            $table->string('lang');
            $table->string('title');
            $table->text('content');

            $table->foreign('slider_image_id')
                ->references('id')
                ->on('slider_images')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_image_translations');
        Schema::dropIfExists('slider_images');
        Schema::dropIfExists('sliders');
    }
}
