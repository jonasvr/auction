<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Questions;
use App\Art;
use App\Era;
use App\Style;
use App\Country;
use Auth;
use Carbon\Carbon;
use Session;
use App\Faq;

class MainController extends Controller
{

  public function overview()
  {  $now      = Carbon::now();
    $random_art = Art::where('sold',0)
                          ->where('ending','>',$now)
                          ->orderBy(\DB::raw('RAND()'))
                          ->paginate(8);
        // http://stackoverflow.com/questions/26983186/how-get-random-row-laravel-5



      $picture = $this->getPicture($random_art);
      $duration = $this->getDuration($random_art,$now);
      $VoS = 'overviewFilter';
      $title = 'overview';
      $onePiece = $this->onePiece();

      return View('art.overview', compact('random_art','duration','picture','VoS','title','onePiece'));
  }

  public function overviewFilter($filter,$value)
  {
    $now      = Carbon::now();
    $random_art = Art::where('sold',0)
                          ->where('ending','>',$now)
                          ->where(function ($query)use ($filter,$value) {
                               switch ($filter) {
                                 case 'style':
                                   $query->where('style_id',$value);
                                   break;
                                 case 'era':
                                   $query->where('era_id',$value);
                                   break;
                                 case 'price':
                                   $lower = $this->filterOnPrice($value);
                                   if ($value == 'up') {
                                    $query->where('price','>',$lower);
                                   }
                                   else {
                                    //$query->whereBetween('price', [$lower, $price+1]);
                                    $query->where('price','<',$value);
                                   }
                                   break;
                                case 'when':
                                  $when = $this->filterOnWhen($value);
                                  echo $when;
                                  $query->where('ending','<',$when);
                                  break;
                               }
                           })
                          ->orderBy(\DB::raw('RAND()'))
                          ->paginate(8);

    $picture = $this->getPicture($random_art);
    $duration = $this->getDuration($random_art,$now);
    $VoS = 'overviewFilter';
    $title = 'overview';
    $onePiece = $this->onePiece();

    $path = $this->getPath($filter,$value);

    return View('art.overview', compact('random_art','VoS','duration','picture','title','onePiece','path'));
  }

  public function search(Request $request)
  {
    $this->validate($request, [
         'search'     => 'required|String',
      ]);
    $search = $request->search;
    Session::put('search',  $search);
    $now        = Carbon::now();
    $random_art = Art::where('sold',0)
                          ->where('ending','>',$now)
                          ->where(function ($query)use ($search) {
                               $query->where('title', 'like', '%' . $search . '%')
                                     ->orWhere('description', 'like', '%' . $search . '%');
                           })
                          ->paginate(8);

    $faqs        = Faq::where('question', 'like', '%' . $search . '%')
                    ->orWhere('awnser', 'like', '%' . $search . '%')
                    ->orWhere('tags', 'like', '%' . $search . '%')
                    ->get();

    $picture  = $this->getPicture($random_art);
    $duration = $this->getDuration($random_art,$now);
    $VoS      = 'searchFilter';
    $title    = 'search';
    $onePiece = $this->onePiece();
    $path     = $search;

    return View('art.overview', compact('random_art','VoS','duration','picture','title','faqs','onePiece', 'path'));
  }

  public function searchFiltert($filter,$value)
  {
    $search = Session::get('search');
    $now      = Carbon::now();
    $random_art = Art::where('sold',0)
                          ->where('ending','>',$now)
                          ->where(function ($query) use ($search) {
                               $query->where('title', 'like', '%' . $search . '%')
                                     ->orWhere('description', 'like', '%' . $search . '%');
                           })
                           ->where(function ($query) use ($filter,$value) {
                                switch ($filter) {
                                  case 'style':
                                    $query->where('style_id',$value);
                                    break;
                                  case 'era':
                                    $query->where('era_id',$value);
                                    break;
                                  case 'price':
                                    $lower = $this->filterOnPrice($value);
                                    if ($value == 'up') {
                                     $query->where('price','>',$lower);
                                    }
                                    else {
                                     //$query->whereBetween('price', [$lower, $price+1]);
                                     $query->where('price','<',$value);
                                    }
                                    break;
                                 case 'when':
                                   $when = $this->filterOnWhen($value);
                                   echo $when;
                                   $query->where('ending','<',$when);
                                   break;
                                }
                            })
                          ->paginate(8);


    $picture  = $this->getPicture($random_art);
    $duration = $this->getDuration($random_art,$now);
    $VoS      = 'searchFilter';
    $title    = 'search';
    $onePiece = $this->onePiece();
    $path     = $search;
    $path     .= $this->getPath($filter,$value);
    return View('art.search', compact('random_art','VoS','duration','picture','title','onePiece'));
  }

  public function getPath($filter,$value)
  {
      $path = $filter. " > ";
      switch ($filter)
      {
      case 'style':
        $path .= Style::where('id',$value)->select('name')->first()->name;
        break;
      case 'era':
        $path .= Era::where('id',$value)->select('name')->first()->name;
        break;
      case 'price':
        $path .=$this->filterOnPrice($value)."-".$value;
        break;
     case 'when':
       break;
     }
     return $path;
  }

  public function getPicture($random_art)
  {
    $picture=array();
    foreach ($random_art as $art) {
      $picture[] = $art->pictures()
                            ->take(1)
                            ->get();
                          }
      return $picture;
  }

  public function getDuration($random_art,$now)
  {
    $duration=array();
    foreach ($random_art as $art) {
        $dt = new \DateTime($art->ending);
        $duration[] = $dt->diff($now);
                          }
      return $duration;
  }

  public function filterOnPrice($price)
  {
    $now      = Carbon::now();
    switch ($price) {
      case 5000:
        $lower = 0;
        break;
      case 10000:
        $lower = 5000;
        break;
      case 25000:
        $lower = 10000;
        break;
      case 50000:
        $lower = 25000;
        break;
      case 100000:
        $lower = 25000;
        break;
      case 'up':
        $lower = 100000;
        break;
      }

      return $lower;
  }

  public function filterOnWhen($when)
  {
    switch ($when) {
      case 'weekend':
      $when = new Carbon('this monday');
        break;
    case 'new':
      $when = Carbon::tomorrow();
        break;
    }
    return $when;
  }

  public function getFaqs()
  {
    $faqs = Faq::all();
    $onePiece = $this->onePiece();

    return View('FAQ',compact('faqs','onePiece'));
  }

  public function isearch()
  {
    $onePiece = $this->onePiece();
    return View('isearch',compact('onePiece'));
  }
}
