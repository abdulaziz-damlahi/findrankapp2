<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class footerseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footers')->insert([
            [
                'facebook' => 'https://www.facebook.com/abood.damlakhi',
                'twitter' => 'https://www.twitter.com/abood.damlakhi',
                'linkedin' => 'https://www.twitter.com/abood.damlakhi',
                'email' => 'abood_d@live.com',
                'aboutUs' => 'we are a great company',
                'location' => 'mersin üniversitesi  çiftlikköy kampüsü teknopark binası',
                'phone' => '05349223582',
                'copyright' => 'Copyright © all right reserved for abood and baris',
            ],
        ]);
    }
}
