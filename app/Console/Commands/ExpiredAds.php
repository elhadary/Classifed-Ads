<?php

namespace App\Console\Commands;

use App\Models\Ads;
use Illuminate\Console\Command;

class ExpiredAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking expiry date of every active ad and if it\'s in the past change is_active to false ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ads = Ads::where('is_active','=',1)->get();
        foreach ($ads as $ad)
        {
          if($ad->expire_at->isPast())
          {
            $ad->is_active = 0;
            $ad->save();
          }
        }
        return Command::SUCCESS;
    }
}
