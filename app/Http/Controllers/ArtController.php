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
use App\Questions;
use Redirect;

use App\Http\Requests\addArtRequest;


class ArtController extends Controller
{

    public function newArt()
    {
        $getEra     = Era::all();
        foreach($getEra as $Era)
        {
            $eras[$Era->id] = $Era->name;
        }

        $getStyle    = Style::all();
        foreach($getStyle as $Style)
        {
            $styles[$Style->id] = $Style->name;
        }

        $getCountry    = Country::all();
        foreach($getCountry as $Country)
        {
            $countrys[$Country->name] = $Country->name;
        }

        return view('art.new', compact('styles','eras','countrys'));
    }
  public function addart(addArtRequest $request)
    {
       //img nog toevoegen + validate

        $data = $request->all();
        $ending                      = Carbon::now()->addDays($data['duration']);
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
        $input->ending               = $ending;

        $input->save();

        foreach ($data['pic'] as $pic) {

            $destinationPath        = 'pic/art/' . $input->id . '/';
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
        $art            =   Art::where('id',$id)
                                  ->where('sold',0)
                                  ->firstOrFail();

        $headpicture    =   Pictures::Where('art_id',$art->id)->first();
        $pictures       =   Pictures::Where('art_id',$art->id)->skip(1)->take(3)->get();


        $nrbids         =   Bid::where('art_id',$art->id)->count();
        if ($nrbids!=1)
        {
          $nrbids         .= " " . trans('detail.bid');
        }else {
          $nrbids         .= " " . trans('detail.singleBid');
        }

        $now       = Carbon::now();
        $dt = new \DateTime($art->ending);
        $duration       = $dt->diff($now);

        return View('art.detail', compact('art','headpicture','pictures','watchlist','nrbids','duration'));
    }

    public function bid(Request $request)
    {
       $this->validate($request, [
            'bid'   => 'required|numeric',
         ]);

         $bid = Art::find($request->art)->highest();

        if( $bid <  $request->bid )
        {
            $input           =   new Bid;
            $input->art_id   =   $request->art;
            $input->user_id  =   Auth::user()->id;
            $input->bid      =   $request->bid;
            $input->save();

            return redirect()->back()->withSuccess(trans('succes.bid', ['bid' => $request->bid]));
        }
        else
        {
            return redirect()->back()->withErrors(['U moet hoger bieden, er is al '.$bid . ' geboden']);
        }
    }

    public function buyNow($art_id)
    {
       $art   = Art::where('id',$art_id)
                      ->where('sold',0)
                      ->firstOrFail();
       $art->sold         = 1;
       $art->sold_for     = $art->price;
       $art->save();

       return view('home')->withSuccess(trans('succes.bought'));
    }


}
