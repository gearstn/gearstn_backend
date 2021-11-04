<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->text('seller_id');
            $table->string('category');
            $table->string('sub_category');
            $table->string('manufacture');
            $table->string('model');
            $table->integer('year');
            $table->string('sn');
            $table->string('condition');
            $table->string('hours');
            $table->longText('description');
            $table->string('sell_type');
            $table->string('rent_hours');
            $table->string('country');
            $table->string('slug');
            $table->longText('images');
            $table->boolean('approved');
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
        Schema::dropIfExists('machines');
    }
}