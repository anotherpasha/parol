<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokuResponseCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doku_response_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('origin');
            $table->text('visa_description')->nullable();
            $table->text('master_description')->nullable();
            $table->text('general_description')->nullable();
            $table->text('actions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doku_response_codes');
    }
}
