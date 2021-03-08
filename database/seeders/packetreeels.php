<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class packetreeels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packets_reels')->insert([
            [
                'word_count'=>'100',
                'description'=>'Her gün otomatik sıra güncellemesi',
                'websites_count'=>'10',
                'names_packets'=>'TEMEL',
                'rank_fosllow'=>'200',
                'price'=>'60',
            ],['word_count'=>'200',
                'description'=>'Her gün otomatik sıra güncellemesi',
                'websites_count'=>'25',
                'names_packets'=>'PRO',
                'rank_fosllow'=>'500',
                'price'=>'100',
            ],
 [   'word_count'=>'50',
     'description'=>'Her gün otomatik sıra güncellemesi',
     'websites_count'=>'5',
     'names_packets'=>'BAŞLANGIÇ',
     'rank_fosllow'=>'100',
     'price'=>'40',]
        ]);
        //
    }
}
