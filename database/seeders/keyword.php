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
            ['name' => 'hemengeilirz 1', 'device' => 'Masaüstü', 'country' => 'AR', 'city' => 'Roque', 'language' => 'english', 'rank' => '4', 'website_id' => '1', 'user_id' => '2'],
            ['name' => 'hemengeilirz 2', 'device' => 'Masaüstü', 'country' => 'AR', 'city' => 'Roque', 'language' => 'english', 'rank' => '4', 'website_id' => '1', 'user_id' => '2'],
            ['name' => 'hemengeilirz 3', 'device' => 'Masaüstü', 'country' => 'AR', 'city' => 'Roque', 'language' => 'english', 'rank' => '4', 'website_id' => '1', 'user_id' => '2'],

            ['name' => 'facebook 4', 'device' => 'Masaüstü', 'country' => 'AR', 'city' => 'Roque', 'language' => 'english', 'rank' => '4', 'website_id' => '2', 'user_id' => '2'],
        ]);
    }
}
