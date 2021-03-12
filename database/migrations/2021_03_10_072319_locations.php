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
            $table->bigIncrements('Criteria_ID')->nullable();
            $table->string('name')->nullable();
            $table->string('Canonical_Name')->nullable();
            $table->integer('Parent_ID')->nullable();
            $table->string('Country_Code')->nullable();
            $table->string('Target_Type')->nullable();
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
