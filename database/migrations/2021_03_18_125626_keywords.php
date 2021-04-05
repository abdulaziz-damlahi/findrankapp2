

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Keywords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        {
            Schema::create('keywords', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('device');
                $table->string('country');
                $table->integer('different');
                $table->string('language');
                $table->string('city');
                $table->integer('rank');
                $table->unsignedBigInteger('website_id')->unsigned();
                $table->unsignedBigInteger('user_id')->unsigned();
                $table->timestamps();
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')->onDelete('cascade');
                $table->foreign('website_id')
                    ->references('id')
                    ->on('websites')->onDelete('cascade');
            });
        }
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
