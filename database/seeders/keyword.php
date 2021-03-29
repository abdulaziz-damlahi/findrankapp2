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
            [
                'name' => 'wewd',
                'device' => 'Masaüstü',
                'country' => 'AR',
                'city' => 'Roque',
                'language' => 'english',
                'rank' => '4',
                'website_id' => '1',
                'user_id' => '2',

            ],
        ]);
    }
}
