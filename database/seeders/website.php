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
            ['website_name' => 'hemegeliriz.com','id_website' => '2',],
            ['website_name' => 'facebook.com','id_website' => '2',],
            ['website_name' => 'instagram.com','id_website' => '2',],
            ['website_name' => 'sdlkflsdf.com','id_website' => '2',],
            ['website_name' => 'asldjalsd.com','id_website' => '2',],
            ['website_name' => 'Bslkfsldfk.com','id_website' => '1',],
            ['website_name' => 'sdklas.com','id_website' => '1',],
            ['website_name' => 'sasdad.com','id_website' => '1',],
            ['website_name' => 'asdasd.com','id_website' => '1',],
            ['website_name' => 'dfgldf.com','id_website' => '1',],
            ['website_name' => 'lkdlaskdass.com','id_website' => '1',],
        ],
        );
    }
}
