<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class website extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            ['website_name' => 'hemegeliriz.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'awd.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'awd.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'sadasd.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'gftg.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'tyhyh.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'jyuky.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'yukyuk.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'dsdssd.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'instagryukyuksasadasyukam.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'instagryukyukwwwwyukam.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'dawdwad.com', 'wordcount' => '0', 'user_id' => '2',],

            ['website_name' => '1.com', 'wordcount' => '0', 'user_id' => '1',],
            ['website_name' => '2.com', 'wordcount' => '0', 'user_id' => '1',],
            ['website_name' => '3.com', 'wordcount' => '0', 'user_id' => '1',],
        ],
        );
    }
}
