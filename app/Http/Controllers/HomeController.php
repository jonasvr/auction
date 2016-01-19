<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Art;
use App\Bid;
use Auth;
use Carbon\Carbon;
use DB;
use App\Pictures;


class HomeController extends Controller
{

  public function home()
  {
    $now = Carbon::now();
    $random_art = Art::where('sold',0)
                  ->where('ending','>',$now)
                  ->orderBy(\DB::raw('RAND()'))
                  ->join('pictures', 'arts.id', '=', 'pictures.art_id')
                  ->select('pictures.path','arts.description','arts.title')
                  ->take(4)
                  ->get();

    $popular   =Bid::groupBy('art_id')
                ->select('art_id', DB::raw('count(art_id) as count'))
                ->whereBetween('created_at', [$now->copy()->subWeek(), $now])
                ->orderBy('count','desc')
                ->take(3)
                ->get();



      foreach ($popular as $art) {
        $picture[] = Pictures::where('art_id',$art->art_id)
                              ->select('path')
                              ->take(1)
                              ->get();
                            }
    return View('home.home', compact('random_art','popular','picture'));
  }


}
