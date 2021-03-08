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
<<<<<<< HEAD:database/migrations/2021_03_05_154859_packets.php
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sa')->unsigned();
            $table->string('count_of_words');
            $table->string('descrpitions');
            $table->string('end_of_pocket');
            $table->string('started_of_pockets');
            $table->string('count_of_websites');
            $table->string('packet_names');
            $table->foreign('id_sa')
                ->references('id')
                ->on('users')->onDelete('cascade');

=======
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
>>>>>>> 7a2e82b9d360ff2c9e0d6a02ffc09ad6d5e1ec74:database/migrations/2021_03_01_153517_create_packets_table.php
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
