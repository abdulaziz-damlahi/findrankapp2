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
  'first_name'=>'Barış',
  'last_name'=>'Çeliker',
  'phone'=>'5375751554',
  'company_name'=>'',
  'company_email'=>'',
  'company_logo'=>'',
  'email'=>'td21brs14@hotmail.com',
  'password'=>bcrypt(5456465),
    ],[
            'first_name'=>'Barış',
            'last_name'=>'Çeliker',
            'phone'=>'5375751554',
            'email'=>'eeee',
            'password'=>bcrypt('eeee'),
        ]);
    }
}
