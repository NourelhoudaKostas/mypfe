<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Models\playliste;
use Illuminate\Http\Request;

class PlaylisteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = session('LoginId_F');
        $formateur = Formateur::find($id);
        $playliste = playliste::where('formateur_id' ,$id )->get();
        
        return view('formateur.playlistes.creation',compact('formateur','playliste'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
           
            'newplayliste'=>'required_if:playliste,0',
            
          
            'description'=>'required' 
        ]);
         
            $pathImage = $request->file('image')->store('images','public');
           // dd($path);
           $course = new playliste();
      
           $course->image_path = $pathImage;
           $course->description = $request->description;
           $course->name = $request->newplayliste;
           $course->formateur_id = session('LoginId_F');
           $stmt = $course->save();

            if($stmt){
                session()->flash('success','le playliste a ete cree avec success');
                return back();
            }else{

                return 'error';
            }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(playliste $playliste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(playliste $playliste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, playliste $playliste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $playliste = playliste::find($id);
       $stmt = $playliste->delete();
       if($stmt){
           session()->flash('success','le playliste a ete supprime avec success');
           return back();
       }else{
           session()->flash('fail','opertation is fail');
           return back();
       }
    }
}
