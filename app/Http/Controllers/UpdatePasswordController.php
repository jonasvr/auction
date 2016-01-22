<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use Hash;
use Flash;

class UpdatePasswordController extends Controller
{
    public function getUpdate()
    {
      return View('auth.update');
    }

    public function postUpdate(Request $request)
    {
      $this->validate($request, [
          'old_password' => 'required',
          'password'     => 'required|confirmed|min:6',
      ]);

      $user = Auth::user();
      if (Hash::check($request->old_password, $user->password)) {
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/')->withSuccess('your password is change');

      }else {

        return redirect()->back()->withError('old password is not correct');
        }

    }
}
