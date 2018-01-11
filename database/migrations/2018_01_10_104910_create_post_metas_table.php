<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id')->unsigned();
            $table->string('meta_key');

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });

        Schema::create('post_meta_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_meta_id')->unsigned();
            $table->string('locale');
            $table->text('value')->nullable();

            $table->foreign('post_meta_id')
                ->references('id')
                ->on('post_metas')
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
        Schema::dropIfExists('post_meta_translations');
        Schema::dropIfExists('post_metas');
    }
}
