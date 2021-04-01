<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Invoicerecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invoicerecords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name', 255)->nullable();
            $table->bigInteger('id_number')->nullable()->length(20)->unsigned();
            $table->string('tax_no', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->bigInteger('phone')->unsigned();
            $table->string('district', 255)->nullable();
            $table->enum('invoice_type', ['individual', 'institutional'])->default('individual');
            $table->enum('taxpayer',['false','true'])->default('false');
            $table->string('company_name', 100)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');

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
