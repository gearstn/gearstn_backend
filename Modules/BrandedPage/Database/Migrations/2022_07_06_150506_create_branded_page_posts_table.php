<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandedPagePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branded_page_posts', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->unsignedBigInteger('branded_page_id');
            $table->unsignedBigInteger('image_id');
            $table->foreign("branded_page_id")->references("id")->on("branded_pages")->onDelete("cascade");
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
        Schema::dropIfExists('branded_page_posts');
    }
}
