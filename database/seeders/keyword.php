<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            ['name' => 'hemengeilirz 1', 'device' => 'Masaüstü', 'country' => 'AR', 'language' => 'english','different' => 0, 'city' => 'Roque', 'rank' => '4',  'website_id' => '1', 'user_id' => '2', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'hemengeilirz 2', 'device' => 'Masaüstü', 'country' => 'AR', 'language' => 'english','different' => 0, 'city' => 'Roque', 'rank' => '4',  'website_id' => '1', 'user_id' => '2','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'hemengeilirz 3', 'device' => 'Masaüstü', 'country' => 'AR', 'language' => 'english','different' => 0, 'city' => 'Roque', 'rank' => '4',  'website_id' => '1', 'user_id' => '2','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'hemengeilirz 4', 'device' => 'Masaüstü', 'country' => 'AR', 'language' => 'english','different' => 0, 'city' => 'Roque', 'rank' => '4',  'website_id' => '1', 'user_id' => '2','created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['name' => 'facebook 5', 'device' => 'Masaüstü', 'country' => 'AR', 'language' => 'english','different' => 0, 'city' => 'Roque', 'rank' => '4',  'website_id' => '2', 'user_id' => '2','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
