<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Carbon\Carbon;
use App\Art;
use App\watchlist;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function onePiece() //header artpiece
    {
      $now = Carbon::now();
      $onePiece = Art::where('sold',0)
                    ->where('ending','>',$now)
                    ->orderBy(\DB::raw('RAND()'))
                    ->join('pictures', 'arts.id', '=', 'pictures.art_id')
                    ->select('pictures.path','arts.description','arts.title','arts.id')
                    ->first();
      if(!empty($onepiece))
      {
        $onePiece->shortdesc = implode(' ', array_slice(explode(' ', $onePiece->description), 0, 25)) . "..."; }
      else{$onePiece = 'empty';}
      return $onePiece;
    }

    public function buy($price)
    {
      $art->sold         = 1;
      $art->sold_for     = $art->price;
      $art->sold_to      = Auth::user()->id;;
      $art->save();
      Bid::where('art_id',$art_id)->delete();
      watchlist::where('art_id',$art_id)->delete();
    }
}
