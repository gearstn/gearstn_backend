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
            $table->id();
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
            $table->string('skq');

            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('manufacture_id');
            $table->unsignedBigInteger('seller_id');
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->foreign("subcategory_id")->references("id")->on("subcategories")->onDelete("cascade");
            $table->foreign("manufacture_id")->references("id")->on("manufactures")->onDelete("cascade");
            $table->foreign("seller_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("model_id")->references("id")->on("models")->onDelete("cascade");
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
