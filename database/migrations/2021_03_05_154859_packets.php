<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Packets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sa')->unsigned();
            $table->string('count_of_words');
            $table->string('descrpitions');
            $table->date('end_of_pocket');
            $table->string('count_of_websites');
            $table->string('packet_names');
            $table->foreign('id_sa')
                ->references('id')
                ->on('users')->onDelete('cascade');

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
        //
    }
}
