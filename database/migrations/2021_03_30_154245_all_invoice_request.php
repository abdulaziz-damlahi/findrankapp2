<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllInvoiceRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('all_invoice_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id');
            $table->integer('invoice_price');
            $table->string('description');
            $table->string('city');
            $table->unsignedBigInteger('phone');
            $table->unsignedBigInteger('tax_number');
            $table->enum('invoice_type', ['individual', 'institutional'])->default('individual');
            $table->enum('invoice_sales_type', ['e-invoice', 'e-archive'])->default('e-invoice');
            $table->string('tax_office')->default('0');
            $table->date('order_date');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
