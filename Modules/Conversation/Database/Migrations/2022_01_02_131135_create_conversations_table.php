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
            $table->boolean('sender_done')->default(0);
            $table->boolean('receiver_done')->default(0);
            $table->unsignedBigInteger('sender_id');
            $table->foreign("sender_id")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger('receiver_id');
            $table->foreign("receiver_id")->references("id")->on("users")->onDelete("cascade");
            $table->unsignedBigInteger('machine_id')->nullable();
            $table->foreign("machine_id")->references("id")->on("machines")->onDelete("cascade");
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
