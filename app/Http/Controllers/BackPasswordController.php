<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Mail\backpassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class BackPasswordController extends Controller
{
    //
    public function showform($id)
    {
        return view('authentification.formresetpassword', compact('id'));
    }

    public function restetpassword(Request $request, $id)
    {
        $request->validate([
            'new_password1' => 'required',
            'new_password2' => 'required'
        ]);
        $users = User::where('id', $id)->get();
        if ($request->new_password1 == $request->new_password2) {
            foreach ($users as $user) {
                $user->password = Hash::make($request->new_password1);
                $user->update();
                return redirect()->route('login')->with('success','your password are changed with success');
            }
        } else {
            return back()->with('fail', 'You have error in new password');
        }
    }
}
