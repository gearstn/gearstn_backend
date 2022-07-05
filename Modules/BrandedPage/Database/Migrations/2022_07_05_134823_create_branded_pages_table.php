<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandedPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branded_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('slug');
            $table->longText('about_en');
            $table->longText('about_ar');
            $table->string('address')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('website_link')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('image_id');
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("image_id")->references("id")->on("uploads")->onDelete("cascade");
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
        Schema::dropIfExists('branded_pages');
    }
}
