<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Websites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('websites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('website_name');
            $table->unsignedBigInteger('id_website')->unsigned();

            $table->foreign('id_website')
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
