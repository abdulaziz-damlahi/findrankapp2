<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\packets;
class packeets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'packeets:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $packets = packets::find(1);
       $packets->delete();
       $this->info('başarıyla silindi');
    }
}
