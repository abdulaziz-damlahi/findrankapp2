<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class      Locations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('Criteria ID')->nullable();
            $table->string('name')->nullable();
            $table->string('Canonical Name')->nullable();
            $table->integer('Parent ID')->nullable();
            $table->string('Country Code')->nullable();
            $table->string('Target Type')->nullable();
            $table->string('Status')->nullable();
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
