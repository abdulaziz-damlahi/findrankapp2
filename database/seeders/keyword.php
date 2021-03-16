<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class keyword extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keywords')->insert([
            ['name' => 'klima', 'rank' => '2', 'website_id' => '1','user_id'=>'1'],
            ['name' => 'klima', 'rank' => '2', 'website_id' => '1','user_id'=>'1'],

        ],
        );
    }
}
