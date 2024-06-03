<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
   public function inscription(){
    return view('utilisateurs.inscription');
   }

   public function inscriptionPost(Request $request){
    $request->validate([
        'nom'=>'required|max:30',
        'prenom'=>'required|max:50',
        'telephone'=>'required|max:15',
        'email'=>'required',
        'password'=>'required|max:10',

    ]);
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

   public function connexion(){
    return view('utilisateurs.connexion');
   }

   public function connexionPost(Request $request){
    $creditials=[
        'email'=>$request->email,
        'password' => $request->password,
    ];
    if(Auth::attempt($creditials)){
        return redirect ('/')->with('success','connexion avec succes');
    }
 return back()->with('error','vérifier votre mail ou mot de passe');
   }

   public function deconnexion(){
    Auth::logout();
    return redirect()->route('connexion');
   }
}
