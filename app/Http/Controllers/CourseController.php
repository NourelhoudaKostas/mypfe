<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\admin;
use App\Models\Course;
use App\Models\Module;
use App\Models\Formateur;
use App\Models\playliste;
use App\Models\playlistes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
//    public $type_globale, $object;
    // public function index($Type)
    // {
    //     //
    //     $Typencrypted = Crypt::decrypt($Type);
    //     // $id = Crypt::decrypt($id);
    //     $this->type_globale = $Typencrypted;
    //     $id = session('LoginId');
    //    // dd($id);
    //     $user = User::find($id);
    //     $admin = admin::find($id);
    //     $formateur = Formateur::find($id);
    //     if ($Typencrypted == 'U') {
    //         $this->object = $user;
    //     } elseif ($Typencrypted == 'A') {
    //         $this->object = $admin;
    //     } elseif ($Typencrypted == 'F') {
    //         $this->object = $formateur;
    //     }
    //     $object = $this->object;
    //     //dd($object);
    //     //return view('cour', compact('object', 'Type','Typencrypted'));
    //     return view('courses.storecourses', compact('object', 'Type','Typencrypted'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $id = session('LoginId_F');
        $formateur = Formateur::find($id);
        // $courses = Course::where('formateur_id' ,session('LoginId_F') )->get();
        $playliste = playliste::where('formateur_id' ,$id )->get();
        // $courseIds = playliste::where('formateur_id', $id)->pluck('course_id')->unique();

// $courses = Course::whereIn('id', $courseIds)->get();
                $playlistsWithCoures = Playliste::with('course')
                    ->where('formateur_id', $id)
                    ->orderBy('created_at') 
                    ->get();
                    // dd($playlistsWithCoures);
        
   
        return view('formateur.cours.index', compact('formateur','playliste','playlistsWithCoures'));
    }

    // public function create()
    // {
    //     $id = session('LoginId_F');
    //     $formateur = Formateur::find($id);
        
    //     return view('formateur.cours.creation',compact('formateur'));
    // }

    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'title'=>'required',
            'playlist_id'=>'required',
            'video'=>['required','mimes:mp4'],
            'description'=>'required' 
        ]);
           
            
        $path = $request->file('video')->store('video', 'public');
           
           // dd($path);
           $course = new Course();
           $course->title = $request->title;
           $course->video_path = $path;
       
           $course->description = $request->description;
           $course->playliste_id = $request->playlist_id;
           $stmt = $course->save();
            if($stmt){
                session()->flash('success','le course a ete cree avec success');
                // dd('hello');
                return back();
            }else{

                return 'error';
            }

        
       
    }

    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'teachername' => 'required',
            'title' => 'required',
            'description' => 'required',
            'filiere' => 'required',
            'module' => 'required',
            'duration' => 'required'
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
                         ->with('success','Course updated successfully');
    }

    public function destroy($id)
    {
       
        $formateur = Course::find($id);
        $formateur->delete();

        return redirect()->route('course.view')
                         ->with('success','Course deleted successfully');
    }
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(StoreCourseRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Course $course)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Course $course)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdateCourseRequest $request, Course $course)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Course $course)
    // {
    //     //
    // }

    public function lirecourse($id){
       $course = Course::find($id); 
       $videoPath = Storage::url($course->video_path);
      // dd($videoPath);
       return view('formateur.cours.lirecourse', ['videoPath' => $videoPath]);
    }
}
