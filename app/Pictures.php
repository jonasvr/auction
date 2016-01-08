<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
	protected $table = 'pictures';

    protected $fillable = ['name', 'art_id', 'path'];
}
