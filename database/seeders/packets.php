<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class packets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('packets')->insert([

        [
            'count_of_words'=>'21',
            'descrpitions'=>'Çeliker',
            'count_of_websites'=>'21',
            'packet_names'=>'sada',
            'user_id'=>'1',
            'end_of_pocket'=>\Carbon\Carbon::now()->addMonth(1),
            ]
            ]);
    }
}
