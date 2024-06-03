<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
   public function inscription(){
    return view('utilisateurs.inscription');
   }

   public function inscriptionPost(Request $request){
    $user= new User();
    $user->nom=$request->nom;
    $user->prenom=$request->prenom;
    $user->telephone=$request->telephone;
    $user->email=$request->email;
    $user->role="admin";
    $user->password=Hash::make($request->password);
    $user->save();
    return back()->with('success','inscription avec succes');
   }
}
