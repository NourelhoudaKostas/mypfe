<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\admin;
use App\Models\Formateur;
use App\Mail\backpassword;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules\Unique;

class AutheficationController extends Controller
{
  public $var;
  //view login form
  public function login_view()
  {
    return view('authentification.login');
  }
  //login action
  public function login_action(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email',
      // Rule::unique('users', 'email')->where(function ($query) {
      //   return $query->whereNull('deleted_at');
      // }),
      // Rule::unique('admins', 'email')->where(function ($query) {
      //   return $query->whereNull('deleted_at');
      // }),
      // Rule::unique('formateurs', 'email')->where(function ($query) {
      //   return $query->whereNull('deleted_at');
      // })
    ],
      'password' => ['required', 'max:20', 'min:7']
    ]);
    //d($request);
    $user = User::where('email', $request->email)->first();
    //dd($user);
    if ($user) {
      if (Hash::check($request->password, $user->password)) {
        if($user->activation == 0){
          return "votre compte n'est pas active";
        }else{
          $request->session()->put('LoginId_U', $user->id);
          $request->session()->put('playlist_id', $user->playlist_id);
        return redirect()->route('homepage');
        }
        
      } else {
        return back()->with('fail', 'password not correct');
      }
    } else {
      $admin = admin::where('email_admin', $request->email)->first();
      if ($admin) {
        if (Hash::check($request->password, $admin->password)) {
          $request->session()->put('LoginId_A', $admin->id);
          return redirect()->route('dashbord_admin');
        } else {
          return back()->with('fail', 'password not correct');
        }
      } else {
        // dd('hi');
        $formateur = Formateur::where('email_formateur', $request->email)->first();
        //dd($formateur);
        if ($formateur) {
          if (Hash::check($request->password, $formateur->password)) {
            $request->session()->put('LoginId_F', $formateur->id);
            $this->var = "hi";
            return redirect()->route('dashbord_formateur');
          } else {
            return back()->with('fail', 'password not correct');
          }
        } else {

          return back()->with('fail', 'email not found');
        }
      }
    }
  }
  //Registration new student
  public function Registration_view()
  {
    dd($this->var);
        return  view('authentification.register');
  }
  //registration action
  public function Registration_action(Request $request)
  {
    //  dd($request->all())  ;
     $request->validate([
      'name' => ['required', 'max:15'],
      'email' => ['required', 'email', 'unique:users'],
      'password' => ['required', 'max:12', 'min:7 ','confirmed'],
      'playlist_id' => ['required']
    ]);

   
      $user = new User(); 
      $user->Username = $request->name;
      $user->email = $request->email;
      $user->playlist_id = $request->playlist_id;
      $user->activation = 1;
      $user->password = Hash::make($request->password);
      $res = $user->save();
      if ($res) {
        $user = User::where('email', $request->email)->first();
    //dd($user);
    if ($user) {
      if (Hash::check($request->password, $user->password)) {
        if($user->activation == 0){
          return "votre compte n'est pas active";
        }else{
          $request->session()->put('LoginId_U', $user->id);
          $request->session()->put('playlist_id', $user->playlist_id);

        return redirect()->route('homepage');

        }
        
      } else {
        return back()->with('fail', 'password not correct');
      }
    } 
      } else {
        return back()->with('fail', 'Error/insertion');
      }
  
  }
  // Forget password 
  public function forgetpasword_view()
  {
    return view('authentification.forgetpassword');
  }
  //Forget password action
  public function forgetpasword_action(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email', 'exists:users'],
    ]);
    $users = User::where('email', $request->email)->first();
    try {
      Mail::to($request->email)->send(new backpassword($users));
    } catch (\Throwable $th) {
      return back()->with('fail', 'error in email');
    }
    return redirect()->route('login')->with('success', 'your message is sending');
  }
  // Reset logout
  public function logout()
  {
    session()->flush();
    return redirect()->route('login');
  }
}
