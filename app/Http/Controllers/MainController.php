<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Questions;
use App\Art;


class MainController extends Controller
{

  public function contact(Request $request)
  {
      $this->validate($request, [
           'question'   => 'required',
           'email'      => 'email',
        ]);

        if(!isset($request->confirmed))
        {
            return View('contact.confirm', compact('request'));
        }else {

          if(isset($request->art_id))
          {
            $art_id = $request->art_id;
          }
          else {
            $art_id = 0;
          }

          $input                = new Questions;
          $input->art_id        = $art_id;
          $input->question      = $request->question;
          $input->question      = $request->email;
          $input->user_id       = Auth::user()->id;
          $input->save();

          return route('/')->withSuccess(trans('succes.asked'));

        }
  }

  public function artContact($art_id,$title)
  {
    return View('contact.contact', compact('art_id','title'));
  }
}
