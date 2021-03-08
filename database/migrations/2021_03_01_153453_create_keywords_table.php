<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  Schema::create('keywords', function (Blueprint $table) {
        $table->id();
<<<<<<< HEAD
        $table->string('count_of_words');
        $table->string('website_id');
        $table->string('descrpitions');
        $table->string('end_of_pocket');
        $table->string('started_of_pockets');
        $table->string('count_of_websites');
        $table->string('packet_names');

=======
        $table->string('name');
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
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
        Schema::dropIfExists('keywords');
    }
}
