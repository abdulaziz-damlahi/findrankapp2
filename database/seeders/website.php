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
            ['website_name' => 'facebook.com',
            'wordcount' => '0',
            'user_id' => '2',
            ],
        ],
        );
    }
}
