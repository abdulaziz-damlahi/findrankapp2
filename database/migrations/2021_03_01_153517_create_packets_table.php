<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packets', function (Blueprint $table) {
            $table->bigIncrements('packet_id');
            $table->unsignedBigInteger('website_id');
            $table->string('count_of_words')->nullable();
            $table->string('user_id')->nullable();
            $table->string('descrpitions')->nullable();
            $table->string('end_of_pocket')->nullable();
            $table->string('started_of_pockets')->nullable();
            $table->string('count_of_websites')->nullable();
            $table->string('packet_names')->nullable();
            $table->foreign('website_id')->references('id')->on('websites')->onDelete('cascade');
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
        Schema::dropIfExists('packets');
    }
}
