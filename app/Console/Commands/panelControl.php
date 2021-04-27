<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AllGoogleSearchDatas;
use App\Models\keywords;
use Illuminate\Support\Facades\DB;

class panelControl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:panel';

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
        AllGoogleSearchDatas::where('processtime', "Night")->update(['statusofresult' => "1"]);
    }
}
