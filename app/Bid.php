<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = [ 'art_id', 'user_id','bid'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
