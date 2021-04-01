<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Requests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->unsignedBigInteger('packet_id')->unsigned()->nullable();
            $table->unsignedBigInteger('customer_id')->unsigned()->nullable();
            $table->unsignedBigInteger('invoice_record')->unsigned()->nullable();
            $table->unsignedBigInteger('parasut_customer_id')->unsigned()->nullable();
            $table->unsignedBigInteger('paymnet_id')->unsigned()->nullable();
            $table->unsignedBigInteger('invoice_id')->unsigned()->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('customer_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('invoice_record')
                ->references('id')
                ->on('invoicerecords')->onDelete('cascade');
            $table->foreign('packet_id')
                ->references('id')
                ->on('packets')->onDelete('cascade');
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
