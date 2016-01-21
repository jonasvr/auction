<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//added by jonas
use Auth;
use App\User;
use App\watchlist;
use App\Bid;
use App\Art;
use Redirect;
use App\Notification;

class profileController extends Controller
{
    public function profile()
    {
      $notifications = notification::where('user_id',Auth::user()->id)->get();
      return View('profile.profile', compact('notifications'));
    }

    public function deleteNot($not_id)
    {
      notification::find($not_id)->delete();
      return redirect()->route('profile');
    }

    public function checknoti()
    {
      $notifications = notification::where('user_id',Auth::user()->id)->get();
      //dd(empty($notifications));
      if($notifications->count())
      {
        return response()->json(1);
      }
      return response()->json(0);
    }

    public function addToWatchList($art_id)
    {
    	  $input           =   new Watchlist;
        $input->art_id   =   $art_id;
        $input->user_id  =   Auth::user()->id;
        $input->save();

        return Redirect::back();
    }

    public function deleteFromWatchList($art_id)
    {
        watchlist::where('art_id',$art_id)
                    ->where('user_id',Auth::user()->id)
                    ->delete();

        return Redirect::back();
    }

    public function myWatchlist()
    {
      $list = watchlist::where('watchlists.user_id',Auth::user()->id)
                        ->join('arts','arts.id','=','watchlists.art_id')
                        //->select('arts.id','arts.title','watchlists.created_at')
                        ->paginate(12);
      return View('profile.watchlist', compact('list'));
    }

    public function myAuctions()
    {
        $myArt = Art::where('user_id', Auth::user()->id)
                      ->get();

        $sold   =array();
        $active =array();

        foreach($myArt as $auction)
        {

          $auction['bids'] = $auction->bids()->count();
          if($auction->sold == 1)
          {
            $sold[] = $auction;
          }
          else {
            $auction['highest'] = $auction->highest();
            $active[]   = $auction;
          }
        }
      return View('profile.myauctions',compact('active','sold'));
    }

    public function myBids()
    {
        $mybids = Bid::where('user_id', Auth::user()->id)
                      ->orderby('art_id')
                      ->orderby('bid','desc')
                      ->get();

        $allBids=array();
        foreach ($mybids as $bid)
        {
          $art = Art::where('id', $bid->art_id)
                      ->where('sold',0)
                      ->first();
          if($art)
          {
            $bid['title']=$art->title;
            $bid['ending']=$art->ending;
            $allBids[]=$bid;
          }
        }

        $iBought = Art::where('sold_to',Auth::user()->id)
                        ->get();
        return View('profile.mybids', compact('allBids','iBought'));
    }
}
