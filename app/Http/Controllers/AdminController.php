<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Formateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class AdminController extends Controller
{
    //
    
    public  function dashbord_view()
    {
        $id = session('LoginId_A');
        $admin = admin::find($id);
        return view('admin.admindasbord', compact('admin'));
    }
    public function profile_admin()
    {
        $id = session('LoginId_A');
        $admin = admin::find($id);
        return view('admin.adminprofile', compact('admin'));
    } 
   public function student_activation(){
    $students = User::where('activation',0)->get();
    $id = session('LoginId_A');
    $admin = admin::find($id);
    return view('admin.student-activation',compact('admin','students'));
   }

   public function student_activation_action($id){
    $student = User::find($id);
    $student->activation = 1;
    $student->update();
    session()->flash('success', 'le compte a ete activer !');
    return back()->with('success','le compte a ete activer');
   }

    public function formateurs_view()
    {
        $id = session('LoginId_A');
        $admin = admin::find($id);
        $formateurs = Formateur::all();
        return view('admin.formateurs',compact('admin','formateurs'));

    }   
    public function formateur_add(Request $request){
        $request->validate([
             'Username'=>'required',
             'email'=>'required|email',
             'password'=>'required',
             'specialite'=>'required',
             'telephone', 
             'cin',

        ]);
        $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $formateur = new Formateur();
        $formateur->Username = $request->Username;
        $formateur->email_formateur = $request->email;
        $formateur->specialite = $request->specialite;
        $formateur->telephone =$request->telephone ;
        $formateur->cin=$request->cin;
        $formateur->profile_picture = $profilePicturePath; // Assign profile picture path
        $formateur->password = Hash::make($request->password);
        $res=$formateur->save();
        // dd($res);
        if($res){
            return back()->with('success','opertation is success');
        }
        return back()->with('fail','opertation is fail');

    }
    //show data in edit form
    public function formateur_update(Request $request,$id)
    {
        $request->validate([
             'Username' => 'required',
             'email' => 'required|email',
            //  'password' => 'required|max:8 |min:4',
            'password',
             'specialite',
             'telephone', 
             'cin',
        ]);
        // dd($request->all());
    
        $formateur = Formateur::find($id);
        // dd($formateur);
        $formateur->Username = $request->Username;
        $formateur->email_formateur = $request->email;
        $formateur->password = Hash::make($request->password);
        $formateur->specialite = $request->specialite;
        $formateur->telephone =$request->telephone ;
        $formateur->cin=$request->cin;
        $res = $formateur->update();
    
        if ($res) {
            return back()->with('success', 'Operation successful');
        }
        return back()->with('fail', 'Operation failed');
    }
    //delete
    public function formateur_delete(Request $request) {
    $formateurId = $request->input('formateur_id');
    $formateur = Formateur::find($formateurId);

    if (!$formateur) {
        return back()->with('fail', 'Formateur not found');
    }

    $res = $formateur->delete();

    if ($res) {
        return back()->with('success', 'Formateur deleted successfully');
    }

    return back()->with('fail', 'Failed to delete formateur');
} //student
public function student_view()
    {
        $id = session('LoginId_A');
        $admin = admin::find($id);
        $students = User::where('activation',1)->get();
     
        
        return view('admin.student',compact('admin','students')); 
    }
    public function student_add(Request $request){
       // dd($request->all());
        $request->validate([
             'Username'=>'required',
             'email'=>'required|email',
             'password'=>'required',
            //  'Specialite',
             'age'=>'required',
             'gender'=>'required',
             'telephone'
            // 'module' => 'required'
        ]);
        $student = new User();
        $student->Username = $request->Username;
        $student->email = $request->email;
        $student->age= $request->age ;
        $student->Telephone =$request->telephone ;
        // $student->module=$request->module;
        // $formateur->specialite_id = $request->specialite;
        $student->password = Hash::make($request->password);
        $res=$student->save();
        if($res){
            return back()->with('success','opertation is success');
        }
        return back()->with('fail','opertation is fail');

    }
    //student_update
    public function student_update(Request $request,$id)
    {
        $request->validate([
             'Username' => 'required',
             'email' => 'required|email',
            //  'password' => 'required|max:8 |min:4',
            'password',
            //  'Specialite',
             'telephone', 
             'type_cours',
             'cin',
             'Course_Code'
        ]);
        // dd($request->all());
    
        $student = User::find($id);
        // dd($student);
        $student->Username = $request->Username;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->specialite_id = $request->specialite;
        $student->telephone =$request->telephone ;
        $student->cin=$request->cin;
        $student->Course_Code=$request->Course_Code;
        $student->type_cours=$request->type_cours;
        $res = $student->update();
    
        if ($res) {
            return back()->with('success', 'Operation successful');
        }
        return back()->with('fail', 'Operation failed');
    }

public function search(Request $request){
    $search = $request->input('search');
    //dd($search);
    $id = session('LoginId_A');
    $admin = admin::find($id);
    $students = User::where('Username', 'like', "%".$search."%")->get();
    if($students->count()>0){
        return view('admin.student',compact('admin','students',"specialte","search")); 
    }else{
        $formateurs = User::where('Username', 'like', "%".$search."%")->get();
        if($formateurs->count()>0){
            return view('admin.formateurs',compact('admin','formateurs',"search"));  
        }else{
            session()->flash('fail','not found :'.$search);
            return back(); 
        }
      }
    
    //dd($students);
}
      
    
}