<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//added by jonas
use App\Era;
use App\Style;
use App\Art;
use App\Country;
use Auth;
use Carbon\Carbon;
use App\Pictures;
use App\watchlist;
use App\Bid;

use App\Http\Requests\addArtRequest;
    

class ArtController extends Controller
{

    public function newArt()
    {
        $getEra     = Era::select('id', 'name')
                        ->get();

        foreach($getEra as $Era)
        {
            $eras[$Era->id] = $Era->name;
        }



        $getStyle    = Style::select('id', 'name')
                        ->get();

        foreach($getStyle as $Style)
        {
            $styles[$Style->id] = $Style->name;
        }

        $getCountry    = Country::select('id', 'name')
                        ->get();

        foreach($getCountry as $Country)
        {
            $countrys[$Country->id] = $Country->name;
        }

         // dd($Countrys);
        return view('art.new', compact('styles','eras','cpuntrys'));
    }
    public function addart(addArtRequest $request)
    {
       //img nog toevoegen + validate
    
        $data = $request->all(); 
        
        $input                       = new Art;

        $input->user_id              = Auth::user()->id;
        $input->title                = $data['title'];
        $input->description          = $data['description'];
        $input->condition            = $data['condition'];
        $input->creation_y           = $data['creation_y'];
        $input->dimensions           = $data['dimensions'];
        $input->color                = $data['color'];
        $input->style_id             = $data['style_id'];
        $input->era_id               = $data['era_id'];
        $input->artist               = $data['artist'];
        $input->country              = $data['country'];
        $input->birth                = $data['birth'];
        $input->death                = $data['death'];
        $input->price                = $data['price'];
        
        $input->save();
        $input->id;
        
        foreach ($data['pic'] as $pic) {
            
            $destinationPath        = 'pic/art/' . Auth::user()->id . '/';
            $now = Carbon::now()->format('Y-m-d');
            $extension          = $pic->getClientOriginalExtension();
            $fileName           = rand(11111,99999).'-'.$now.'.'.$extension; // renameing image random name
            //fullpath = path to picture + date + filename + extension
            $fullPath           = $destinationPath . $fileName;   

            $pic->move($destinationPath , $fileName); 


            $picInput                 = new Pictures;
            $picInput->art_id         = $input->id;
            $picInput->path           = $fullPath;
            $picInput->save();


        
        }
        return $this->newArt()->withSuccess('succesvol toegevoegt');
    }

    public function getDetail($id)
    {
        $art            =   Art::find($id);

        $headpicture    =   Pictures::Where('art_id',$art->id)->first();
        $pictures       =   Pictures::Where('art_id',$art->id)->skip(1)->take(3)->get();
        $watchlist      =   watchlist::where('art_id',$id)
                            ->where('user_id',Auth::user()->id)
                            ->count();
       
        
        return View('detail', compact('art','headpicture','pictures','watchlist'));
    }

    public function bid(Request $request)
    {
       $this->validate($request, [
            'bid'   => 'required|numeric',
         ]);
        
        $input           =   new Bid;
        $input->art_id   =   $request->art;
        $input->user_id  =   Auth::user()->id;
        $input->bid      =   $request->bid;
       
       if( $input->save() )
        {
            return $this->getDetail($request->art)->withSuccess(trans('succes.bid', ['bid' => $request->bid]));
        }
        else
        {
            return $this->getDetail($request->art)->withErrors( (trans('error.bid') ) );
        } 
    }
}
