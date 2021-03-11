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
            ['name' => 'klima', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'cars', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'satin al', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'buy', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'sell', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'brought', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'fly ', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'awd ', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'fawdaly ', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'fsdadly ', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'sdasd ', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'asda ', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'asd ', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'awdaw ', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'wdawd ', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'sdfsdf ', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'sdfsdf ', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'sdfsdf ', 'rank' => '2', 'website_id' => '1',],
            ['name' => 'sfsdf ', 'rank' => '2', 'website_id' => '2',],
            ['name' => 'asdasd ', 'rank' => '2', 'website_id' => '1',],
        ],
        );
    }
}
