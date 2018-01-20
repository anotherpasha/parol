<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('building_status');
            $table->string('zipcode');
            $table->string('building_type');
            $table->integer('floor')->default(0);
            $table->string('construction_type')->nullable();
            $table->string('construction_class')->nullable();
            $table->string('package');
            $table->double('building_value')->default(0);
            $table->double('content_value')->default(0);
            $table->double('flexa')->default(0);
            $table->double('rsmdcc')->default(0);
            $table->double('dlv')->default(0);
            $table->double('flood')->default(0);
            $table->double('earthquake')->default(0);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('date');
            $table->string('time');
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
        Schema::dropIfExists('calculators');
    }
}
