<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
class authController extends Controller
{
    public function login(Request $request){
      if(Auth::attempt(['user_email' => $request->email, 'password' => $request->password]))
      {
          return Redirect::to('/');
      }
      else {
          return Redirect::to('/');
      }
    }

}
