<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class keywordsrequest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keyword_requests')->insert([
            ['rank' => '10','keyword_id' => '1','user_id' => '2','created_at' => '2021-3-29  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '1','user_id' => '2','created_at' => '2021-3-30  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '1','user_id' => '2','created_at' => '2021-3-31  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '1','user_id' => '2','created_at' => '2021-4-1  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '20','keyword_id' => '1','user_id' => '2','created_at' => '2021-4-2  13:12:37','updated_at' => '2021-03-30 13:12:37'],

            ['rank' => '10','keyword_id' => '2','user_id' => '2','created_at' => '2021-3-29  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '2','user_id' => '2','created_at' => '2021-3-30  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '2','user_id' => '2','created_at' => '2021-3-31  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '2','user_id' => '2','created_at' => '2021-4-1  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '2','user_id' => '2','created_at' => '2021-4-2  13:12:37','updated_at' => '2021-03-30 13:12:37'],

            ['rank' => '10','keyword_id' => '3','user_id' => '2','created_at' => '2021-3-29  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '3','user_id' => '2','created_at' => '2021-3-30  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '3','user_id' => '2','created_at' => '2021-3-31  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '20','keyword_id' => '3','user_id' => '2','created_at' => '2021-4-1  13:12:37','updated_at' => '2021-03-30 13:12:37'],
            ['rank' => '10','keyword_id' => '3','user_id' => '2','created_at' => '2021-4-2  13:12:37','updated_at' => '2021-03-30 13:12:37'],
        ],);
    }
}
