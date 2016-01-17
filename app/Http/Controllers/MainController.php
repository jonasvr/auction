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



      foreach ($random_art as $art) {
          $picture[] = $art->pictures()
                              ->take(1)
                              ->get();

        $dt = new \DateTime($art->ending);
        $duration[] = $dt->diff($now);
      }
      $VoS = 'overviewFilter';
        $title = 'overview';
      return View('art.overview', compact('random_art','duration','picture','VoS','title'));
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
    $VoS = 'overviewFilter';
    $now      = Carbon::now();


      foreach ($random_art as $art) {
          $picture[] = $art->pictures()
                              ->take(1)
                              ->get();

        $dt = new \DateTime($art->ending);
        $duration[] = $dt->diff($now);
      }
        $title = 'overview';
    return View('art.overview', compact('random_art','VoS','duration','picture','title'));
  }

  public function search(Request $request)
  {
    $search = $request->search;
    Session::put('search',  $search);
    $now      = Carbon::now();
    $random_art = Art::where('sold',0)
                          ->where('ending','>',$now)
                          ->where(function ($query)use ($search) {
                               $query->where('title', 'like', '%' . $search . '%')
                                     ->orWhere('description', 'like', '%' . $search . '%');
                           })
                          ->paginate(8);
    $VoS = 'searchFilter';
    $now      = Carbon::now();


      foreach ($random_art as $art) {
          $picture[] = $art->pictures()
                              ->take(1)
                              ->get();

        $dt = new \DateTime($art->ending);
        $duration[] = $dt->diff($now);
      }
      $title = 'search';
      $faqs = Faq::where('question', 'like', '%' . $search . '%')
                  ->orWhere('awnser', 'like', '%' . $search . '%')
                  ->orWhere('tags', 'like', '%' . $search . '%')
                  ->get();

    return View('art.overview', compact('random_art','VoS','duration','picture','title','faqs'));
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


    $VoS = 'searchFilter';
      foreach ($random_art as $art) {
        $picture[] = $art->pictures()
                              ->take(1)
                              ->get();

        $dt = new \DateTime($art->ending);
        $duration[] = $dt->diff($now);
      }
        $title = 'search';
    return View('art.search', compact('random_art','VoS','duration','picture','title'));
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
    return View('FAQ',compact('faqs'));
  }
}
