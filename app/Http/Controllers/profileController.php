<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class profileController extends Controller
{
    //
    public function addWork()
    {
    	$this->validate($request, [
            'name'			        => 'required',
            'description'           => 'required',
            'condition'             => 'required',
            'artyear'               => 'num',
            'era'					=> 'required',
            
            'death'                	=> 'num',
            'birth'		            => 'num',
            'price'					=> 'required|num'
         ]);
    
    	$data = $request->all(); 
    }
}
