<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('chat_token');
            $table->boolean('contractor_done')->default(0);
            $table->boolean('distributor_done')->default(0);
            $table->unsignedBigInteger('contractor_id');
            $table->foreign("contractor_id")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger('distributor_id');
            $table->foreign("distributor_id")->references("id")->on("users")->onDelete("cascade");
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
        Schema::dropIfExists('conversations');
    }
}
