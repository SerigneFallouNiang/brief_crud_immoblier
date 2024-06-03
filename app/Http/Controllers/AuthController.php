<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
   public function inscription(){
    return view('utilisateurs.inscription');
   }
}
