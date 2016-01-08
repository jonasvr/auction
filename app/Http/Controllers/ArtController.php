<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArtController extends Controller
{
    public function addart(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required',
            'description'           => 'required',
            'condition'             => 'required',
            'artyear'               => 'numeric',
            'era'                   => 'required',
            'img'                   => 'required',
            
            'death'                 => 'numeric',
            'birth'                 => 'numeric',
            'price'                 => 'required|numeric',
         ]);
    
        $data = $request->all(); 

        dd($data);
    }

}
