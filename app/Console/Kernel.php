<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

//added
use App\Art;
use Carbon\Carbon;
use App\Bid;
use App\watchlist;
use App\notification;
use Illuminate\Support\Facades\Mail;


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
        //alle auctions ophalen die eindigen
        $arts = Art::where('ending',"<",$today)
                    ->where('sold',0)
                    ->get();

          // alle bidders afgaan
        foreach ($arts as $art) {
              $bidder = bid::where('bid',$art->highest())
                          ->where('art_id',$art->id)
                          ->select('user_id','bid')
                          ->first();
              if(!$bidder) //als er geen bidders zijn
            {
              $art->sold_for     = 0;
              $art->sold_to      = 0;
              $input                  = new notification;
              $input->user_id         = $art->user_id;
              $input->notification    = $bidder->title . " hasn't been sold before closing.";
              $input->save();
            }
            else
            {
              $art->sold_for     = $bidder->bid;
              $art->sold_to      = $bidder->user_id;
              $this->notification($art->id,$bidder->user_id); //melding sturen naar alle bieders/geintresseerde die het niet verkregen

              $input              = new notification;
              $input->user_id     = $bidder->user_id;
              $input->notification    = $art->title . " is yours for ".$bidder->bid." euro"; //
              $input->save();
            }
              $art->sold         = 1;
              Bid::where('art_id',$art->id)->delete();
              watchlist::where('art_id',$art->id)->delete();
              $art->save();
        }
        Mail::send('email.test', ['name' => 'jonas'], function($message){
          $message->to('jonasvanreeth@gmail.com','test')->subject('welcome!');
        });
      })->dailyAt('00:01');
    }


    public function notification($art_id,$user_id)
    {
      $bidders = bid::where('bids.art_id',$art_id)
                    ->join('arts','arts.id','=','bids.art_id')
                    ->where('bids.user_id','<>',$user_id)
                    ->select('bids.user_id','arts.title')
                    ->get();
      foreach($bidders as $bidder)
      {
        $input                   = new notification;
        $input->user_id          = $bidder->user_id;
        $input->notification     = $bidder->title . " is sold.";
        $input->save();
      }

      $watchlist = watchlist::where('watchlists.art_id',$art_id)
                    ->join('arts','arts.id','=','watchlists.art_id')
                    ->where('watchlists.user_id','<>',$user_id)
                    ->select('watchlists.user_id','arts.title')
                    ->get();

      foreach($watchlist as $list)
      {
        $input                  = new notification;
        $input->user_id         = $list->user_id;
        $input->notification    = $list->title . " from your watchlist is sold.";
        $input->save();
      }
    }
}
