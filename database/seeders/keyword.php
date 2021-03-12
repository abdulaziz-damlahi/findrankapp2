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
            ['name' => 'cars', 'rank' => '2', 'website_id' => '2','user_id'=>'1'],
            ['name' => 'satin al', 'rank' => '2', 'website_id' => '3','user_id'=>'1'],
            ['name' => 'buy', 'rank' => '2', 'website_id' => '4','user_id'=>'1'],
            ['name' => 'sell', 'rank' => '2', 'website_id' => '5','user_id'=>'2'],
            ['name' => 'brought', 'rank' => '2', 'website_id' => '6','user_id'=>'2'],
            ['name' => 'fly ', 'rank' => '2', 'website_id' => '7','user_id'=>'2'],
            ['name' => 'awd ', 'rank' => '2', 'website_id' => '8','user_id'=>'2'],
            ['name' => 'fawdaly ', 'rank' => '2', 'website_id' => '9','user_id'=>'3'],
            ['name' => 'fsdadly ', 'rank' => '2', 'website_id' => '10','user_id'=>'3'],
            ['name' => 'sdasd ', 'rank' => '2', 'website_id' => '11','user_id'=>'3'],
            ['name' => 'asda ', 'rank' => '2', 'website_id' => '1','user_id'=>'1'],
            ['name' => 'asd ', 'rank' => '2', 'website_id' => '2','user_id'=>'1'],
            ['name' => 'awdaw ', 'rank' => '2', 'website_id' => '3','user_id'=>'1'],
            ['name' => 'wdawd ', 'rank' => '2', 'website_id' => '4','user_id'=>'1'],
            ['name' => 'sdfsdf ', 'rank' => '2', 'website_id' => '5','user_id'=>'2'],
            ['name' => 'sdfsdf ', 'rank' => '2', 'website_id' => '6','user_id'=>'2'],
            ['name' => 'sdfsdf ', 'rank' => '2', 'website_id' => '7','user_id'=>'2'],
            ['name' => 'sfsdf ', 'rank' => '2', 'website_id' => '8','user_id'=>'2'],
            ['name' => 'sdsd ', 'rank' => '2', 'website_id' => '9','user_id'=>'3'],
            ['name' => 'sssd ', 'rank' => '2', 'website_id' => '10','user_id'=>'3'],
            ['name' => 'ssaa ', 'rank' => '2', 'website_id' => '11','user_id'=>'3'],
        ],
        );
    }
}
