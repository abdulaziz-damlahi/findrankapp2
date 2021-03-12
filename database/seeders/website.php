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
            ['website_name' => 'hemegeliriz.com','rank'=>'1','user_id' => '1',],
            ['website_name' => 'facebook.com','rank'=>'1','user_id' => '1',],
            ['website_name' => 'instagram.com','rank'=>'1','user_id' => '1',],
            ['website_name' => 'sdlkflsdf.com','rank'=>'1','user_id' => '1',],
            ['website_name' => 'asldjalsd.com','rank'=>'1','user_id' => '2',],
            ['website_name' => 'Bslkfsldfk.com','rank'=>'1','user_id' => '2',],
            ['website_name' => 'sdklas.com','rank'=>'1','user_id' => '2',],
            ['website_name' => 'sasdad.com','rank'=>'1','user_id' => '2',],
            ['website_name' => 'asdasd.com','rank'=>'1','user_id' => '3',],
            ['website_name' => 'dfgldf.com','rank'=>'1','user_id' => '3',],
            ['website_name' => 'lkdlaskdass.com','rank'=>'1','user_id' => '3',],
        ],
        );
    }
}
