<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = 'arts';

    protected $fillable = ['name', 'description', 'condition','creation_y','dimensions','color','style_id','era_id','artist','country','birth','death','birth','price','ending'];

    public function bids()
    {
        return $this->hasMany('App\Bid', 'art_id', 'id');
    }

    public function highest()
    {
        return $this->bids()->max('bid');
    }
    public function highestBidder()
    {
        return $this->bids()->select('user_id')->max('bid');
    }

    public function pictures()
    {
        return $this->hasMany('App\Pictures', 'art_id', 'id');
    }

    public function myWatchlist()
    {
        if(Auth::check() && Watchlist::where('user_id', Auth::user()->id)->where('art_id', $this->id)->exists())
        {
            return true;
        } else
        {
            return false;
        }
    }
}
