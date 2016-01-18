<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Art;
use Carbon\Carbon;
use Redirect;

class AdminController extends Controller
{
  public function index()
  {
    $now = Carbon::now();
    $artPieces = Art::where('sold',0)
                ->where('ending','>',$now)
                ->get();

    return View('admin',compact('artPieces'));
  }

  public function delete($art_id)
  {
    Art::where('id',$art_id )->delete();

    return redirect()->route('admin')->withSuccess('succesvol verwijderd');
  }
}
