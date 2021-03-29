<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['first_name' => 'Barış',
                'last_name' => 'Çeliker',
                'phone' => '5375751554',
                'email' => 'td21brs14@hotmail.com',
                'password' => bcrypt(123456789),
                'parasut_customer_id'=>0,
            ], ['first_name' => 'abood',
                'last_name' => 'damlahi',
                'phone' => '5375751554',
                'email' => 'abood_d@live.com',
                'parasut_customer_id'=>0,

                'password' => bcrypt(123456789),
            ], ['first_name' => 'user3',
                'last_name' => 'damlahi',
                'phone' => '5375751554',
                'email' => 'user3@live.com',
                'parasut_customer_id'=>0,

                'password' => bcrypt(123456789),
            ],
        ],);


    }
}
