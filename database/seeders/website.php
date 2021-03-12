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
            ['website_name' => 'hemegeliriz.com','user_id' => '1',],
            ['website_name' => 'facebook.com','user_id' => '1',],
            ['website_name' => 'instagram.com','user_id' => '1',],
            ['website_name' => 'sdlkflsdf.com','user_id' => '1',],
            ['website_name' => 'asldjalsd.com','user_id' => '2',],
            ['website_name' => 'Bslkfsldfk.com','user_id' => '2',],
            ['website_name' => 'sdklas.com','user_id' => '2',],
            ['website_name' => 'sasdad.com','user_id' => '2',],
            ['website_name' => 'asdasd.com','user_id' => '3',],
            ['website_name' => 'dfgldf.com','user_id' => '3',],
            ['website_name' => 'lkdlaskdass.com','user_id' => '3',],
        ],
        );
    }
}
