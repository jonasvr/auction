<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//added jonas
use Session;
use Redirect;

class LanguageController extends Controller
{
    public function chooser($lng)
    {
    	Session::put('locale',  $lng);
    	return Redirect::back();
    }
}
