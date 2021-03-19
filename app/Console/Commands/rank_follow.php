<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\websites;
use App\Models\keywords;
use Illuminate\Support\Facades\DB;
class rank_follow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rank_follow:name';

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
    //  $keywords = keywords::get()->id;
        $keywords = keywords::all();
        $websites = websites::get('id');
   //   $websie=  DB::table('websites')->find();
        foreach ($websites as $website_id) {
            $this->info($website_id);
            $userkeywordcount = keywords::where('website_id', '=', $website_id->id)->get('name','id');
            $userkeywordcounid2 = keywords::where('website_id', '=', $website_id->id)->get('id');
            $this->info($userkeywordcount);
        }
     //   $websites2 = keywords::find($websites->id);

     //   $userkeywordcount = keywords::where('website_id', '=', $websites)->get('name');

        //   $this->info($userkeywordcount);
        /*

*/

    }
}
