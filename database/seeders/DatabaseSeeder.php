<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
        $this->call(packetreeels::class);
        $this->call(website::class);
        $this->call(keyword::class);
        $this->call(packetsOfUser::class);
        // \App\Models\User::factory(10)->create();
    }
}
