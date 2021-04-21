<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllGoogleSearchDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('all_google_search_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('keyword');
            $table->string('website');
            $table->string('colonial_name');
            $table->string('device');
            $table->string('token');
            $table->string('language');
            $table->enum('statusofresult', ['0', '1'])->default('1');
            $table->enum('processtime', ['Currency', 'Night'])->default('Night');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('keyword_id')->unsigned()->nullable();
            $table->foreign('keyword_id')
                ->references('id')
                ->on('keywords')->onDelete('cascade');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
