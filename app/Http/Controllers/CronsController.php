<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Art;
use Carbon\Carbon;
use App\Bid;
use App\watchlist;

class CronsController extends Controller
{
  public function index()
  {
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
    }
  }
}
