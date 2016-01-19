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
use App\Notification;


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
        //$input->slug                 = $this->slugify($data['title'], "-");
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

        return redirect()->route('new')->withSuccess('succesvol toegevoegt');
    }

    public function getDetail($id)
    {
        $onePiece       =   $this->onePiece();
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

        $now            = Carbon::now();
        $dt             = new \DateTime($art->ending);
        $duration       = $dt->diff($now);

        $related        = Art::where('arts.style_id',$art->style_id)
                                  ->where('sold',0)
                                  ->join('pictures','pictures.art_id','=','arts.id')
                                  ->where('ending','>',$now)
                                  ->orderBy(\DB::raw('RAND()'))
                                  ->take(4)
                                  ->get();
        foreach ($related as $rel) {
          $dt             = new \DateTime($art->ending);
          $relDuration[]  = $dt->diff($now);
        }

        $watchlist = watchlist::where('art_id',$id)
                                ->where('user_id',Auth::user()->id)
                                ->first();

        return View('art.detail', compact('art','headpicture','pictures','watchlist','nrbids','duration','onePiece','related','relDuration'));
    }

    public function bid(Request $request)
    {
       $this->validate($request, [
            'bid'   => 'required|numeric',
         ]);

         $bid = Art::find($request->art)->highest();

        if( $bid <  $request->bid )
        {

          $input = Bid::where('user_id',Auth::user()->id)
                        ->where('art_id',$request->art)
                        ->first();
          if(empty($input))
          {
            $input           =   new Bid;
            $input->art_id   =   $request->art;
            $input->user_id  =   Auth::user()->id;
          }

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
        $art->sold_to      = Auth::user()->id;
        $art->save();

        $this->notification($art->id,Auth::user()->id);

        Bid::where('art_id',$art_id)->delete();
        watchlist::where('art_id',$art_id)->delete();

       return redirect()->route('/')->withSuccess(trans('succes.bought'));
    }

    protected function slugify($text)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

      // trim
      $text = trim($text, '-');

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // lowercase
      $text = strtolower($text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      $text = $text . '-' . str_random(5);

      if (empty($text))
      {
        return 'n-a';
      }

      return $text;
    }

    public function notification($art_id,$user_id)
    {
      $bidders = bid::where('bids.art_id',$art_id)
                    ->join('arts','arts.id','=','bids.art_id')
                    ->where('bids.user_id','<>',$user_id)
                    ->select('bids.user_id','arts.title')
                    ->get();
      foreach($bidders as $bidder)
      {
        $input              = new notification;
        $input->user_id     = $bidder->user_id;
        $input->notification     = $bidder->title . " is sold.";
        $input->save();
      }

      $watchlist = watchlist::where('watchlists.art_id',$art_id)
                    ->join('arts','arts.id','=','watchlists.art_id')
                    ->where('watchlists.user_id','<>',$user_id)
                    ->select('watchlists.user_id','arts.title')
                    ->get();

      foreach($watchlist as $list)
      {
        $input              = new notification;
        $input->user_id     = $list->user_id;
        $input->notification    = $list->title . " from your watchlist is sold.";
        $input->save();
      }
    }
}
