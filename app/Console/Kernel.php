<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

//added
use App\Art;
use Carbon\Carbon;
use App\Bid;
use App\watchlist;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      $schedule->call(function () {


        $today = Carbon::today();
        $arts = Art::where('ending',"<",$today)
                    ->where('sold',0)
                    ->get();

            //dd($arts);
        foreach ($arts as $art) {
          $bidder = bid::where('bid',$art->highest())
                          ->where('art_id',$art->id)
                          ->select('user_id','bid')
                          ->first();
            //echo($bidder);
            if(!$bidder)
            {
              $art->sold_for     = 0;
              $art->sold_to      = 0;
            }
            else
            {
              $art->sold_for     = $bidder->bid;
              $art->sold_to      = $bidder->user_id;
            }
              $art->sold         = 1;
              Bid::where('art_id',$art->id)->delete();
              watchlist::where('art_id',$art->id)->delete();
              $art->save();

      })->dailyAt('00:00');	
    }
}
