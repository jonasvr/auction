<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Carbon\Carbon;
use App\Art;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function onePiece()
    {
      $now = Carbon::now();
      $onePiece = Art::where('sold',0)
                    ->where('ending','>',$now)
                    ->orderBy(\DB::raw('RAND()'))
                    ->join('pictures', 'arts.id', '=', 'pictures.art_id')
                    ->select('pictures.path','arts.description','arts.title','arts.id')
                    ->first();
      $onePiece->shortdesc = implode(' ', array_slice(explode(' ', $onePiece->description), 0, 25)) . "...";
      return $onePiece;
    }

}
