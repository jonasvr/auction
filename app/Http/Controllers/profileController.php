<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//added by jonas 
use Auth;
use Users;
use App\watchlist;
use App\Bid;
use Redirect;

class profileController extends Controller
{
    //
    public function addToWatchList($art_id)
    {
    	$input           =   new Watchinput;
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

    public function bid(Request $request)
    {
      
       $this->validate($request, [
            'bid'   => 'required|numeric',
         ]);
       
      
        $input           =   new Bid;
        $input->art_id   =   $request->id;
        $input->user_id  =   Auth::user()->id;
        $input->bid      =   $request->bid;
        $input->save();


        return redirect::back()
                        //->route('detail', [$request->art])
                        ->withSuccess('test' );
                        //trans('succes.bid', ['bid' => $request->bid])
    }
}
