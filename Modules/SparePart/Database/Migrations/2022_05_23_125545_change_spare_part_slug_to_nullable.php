<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSparePartSlugToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spare_parts', function (Blueprint $table) {
            $table->string('slug')->nullable()->change();
            $table->string('sku')->nullable()->change();
            $table->unsignedBigInteger('city_id')->nullable()->change();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spare_parts', function (Blueprint $table) {
            $table->string('slug')->change();
            $table->string('sku')->change();
            $table->unsignedBigInteger('city_id')->change();
        });    }
}
