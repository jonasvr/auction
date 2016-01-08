<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewArt extends Model
{
    protected $table = 'pictures';

    protected $fillable = ['name', 'description', 'condition','creation_y','dimensions','color','style_id','era_id','artist','country','birth','death','birth','price'];
}
