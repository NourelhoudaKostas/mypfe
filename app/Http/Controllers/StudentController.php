<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function Student_view()
    {
        $id = session('LoginId_U');
        $user = User::find($id);
        return view('user.dashbord_user', compact('user'));
    }
    public function profile_Student()
    {
        $id = session('LoginId_U');
        $user = User::find($id);
        return view('userprofile.', compact('user'));
    }
    public function register(Request $request){
        $request->validate([
            //name form
            'name' => ['required'],
            'email'=>['required','unique:users'],
            // 'phone'=>['nullable'],
            'password'=>['required','confirmed']
            ]) ;   
            $student=new User();
            //bd
            $student->Name=$request->name;
            $student->Email=$request->email;
            // $student->PhoneNumber=$request->phone; 
            $student->Password;
            return('Register Successfully!');
    }
}
