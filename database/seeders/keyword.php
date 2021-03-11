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
            ['name' => 'klima', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'cars', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'satin al', 'rank' => '2', 'website_id' => '3',],
            ['name' => 'buy', 'rank' => '2', 'website_id' => '4',],
            ['name' => 'sell', 'rank' => '2', 'website_id' => '5',],
            ['name' => 'brought', 'rank' => '2', 'website_id' => '6',],
            ['name' => 'fly ', 'rank' => '2', 'website_id' => '7',],
            ['name' => 'awd ', 'rank' => '2', 'website_id' => '8',],
            ['name' => 'fawdaly ', 'rank' => '2', 'website_id' => '9',],
            ['name' => 'fsdadly ', 'rank' => '2', 'website_id' => '10',],
            ['name' => 'sdasd ', 'rank' => '2', 'website_id' => '11',],
            ['name' => 'asda ', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'asd ', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'awdaw ', 'rank' => '2', 'website_id' => '3',],
            ['name' => 'wdawd ', 'rank' => '2', 'website_id' => '4',],
            ['name' => 'sdfsdf ', 'rank' => '2', 'website_id' => '5',],
            ['name' => 'sdfsdf ', 'rank' => '2', 'website_id' => '6',],
            ['name' => 'sdfsdf ', 'rank' => '2', 'website_id' => '7',],
            ['name' => 'sfsdf ', 'rank' => '2', 'website_id' => '8',],
            ['name' => 'asdasd ', 'rank' => '2', 'website_id' => '9',],
        ],
        );
    }
}
