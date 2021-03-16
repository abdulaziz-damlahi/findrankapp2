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
            ['website_name' => 'facebook.com', 'wordcount' => '0', 'user_id' => '2',],
            ['website_name' => 'instagram.com', 'wordcount' => '0', 'user_id' => '2',],

            ['website_name' => '1.com', 'wordcount' => '0', 'user_id' => '1',],
            ['website_name' => '2.com', 'wordcount' => '0', 'user_id' => '1',],
            ['website_name' => '3.com', 'wordcount' => '0', 'user_id' => '1',],

        ],
        );
    }
}
