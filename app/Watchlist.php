<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class watchlist extends Model
{
    protected $table = 'watchlists';

    protected $fillable = [ 'art_id', 'user_id'];

    public function art()
    {
        return $this->belongsTo('App\Art', 'art_id', 'id');
    }
}
