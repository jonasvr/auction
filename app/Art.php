<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = 'arts';

    protected $fillable = ['name', 'description', 'condition','creation_y','dimensions','color','style_id','era_id','artist','country','birth','death','birth','price','ending'];
}
