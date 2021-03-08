<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PacketsReels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('packets_reels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('word_count');
            $table->string('description');
            $table->integer('websites_count');
            $table->string('names_packets');
            $table->integer('rank_fosllow');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
