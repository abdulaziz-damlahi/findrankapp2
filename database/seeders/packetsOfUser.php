<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class packetsOfUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('packets_of_users')->insert([
            ['count_of_words'=>'0', 'max_count_of_words'=>'100', 'max_count_of_websites'=>'10', 'descrpitions'=>'pro', 'end_of_pocket'=>\Carbon\Carbon::now()->addMonth(1), 'count_of_websites'=>'0', 'user_id'=>'3', 'rank_follow'=>'0', 'rank_follow_max'=>'0', 'packet_names'=>'pro', 'user_id'=>'2',"price"=>40],
            ['count_of_words'=>'0', 'max_count_of_words'=>'100', 'max_count_of_websites'=>'10', 'descrpitions'=>'pro', 'end_of_pocket'=>\Carbon\Carbon::now()->addMonth(1), 'count_of_websites'=>'0', 'user_id'=>'2', 'rank_follow'=>'0', 'rank_follow_max'=>'0', 'packet_names'=>'pro', 'user_id'=>'2',"price"=>40],
            ['count_of_words'=>'0', 'max_count_of_words'=>'100', 'max_count_of_websites'=>'10', 'descrpitions'=>'pro', 'end_of_pocket'=>\Carbon\Carbon::now()->addMonth(1), 'count_of_websites'=>'0', 'user_id'=>'1', 'rank_follow'=>'0', 'rank_follow_max'=>'0', 'packet_names'=>'pro', 'user_id'=>'2',"price"=>40],
            ['count_of_words'=>'0', 'max_count_of_words'=>'100', 'max_count_of_websites'=>'10', 'descrpitions'=>'pro', 'end_of_pocket'=>\Carbon\Carbon::now()->addMonth(1), 'count_of_websites'=>'0', 'user_id'=>'1', 'rank_follow'=>'0', 'rank_follow_max'=>'0', 'packet_names'=>'pro', 'user_id'=>'2',"price"=>40]

        ]);
    }
}
