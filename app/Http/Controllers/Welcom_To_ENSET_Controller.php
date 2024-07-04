<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Barryvdh\DomPDF\PDF;
use App\Models\playliste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class Welcom_To_ENSET_Controller extends Controller
{
    //
    public function  index(){
       return  view('Welcome _to_Enset');
    }
    public function  Store_index(){


         $playlistsWithCoures = Playliste::with('course')
         ->where('id' , session('playlist_id'))
         ->orderBy('created_at') 
         ->get();

      //   dd(session('playlist_id'));
         $playliste = Playliste::where('id' , session('playlist_id'))
         ->with('questions', 'questions.answers')
         ->orderBy('created_at')
         ->get();

         $test = Test::where('playlist_id',session('playlist_id'))->first();

        
        return  view('StoreElerning.Store',compact('playlistsWithCoures','playliste','test'));
     } 
     public function about()
    {
      $tests = Test::with(['user', 'playlist', 'playlist.questions'])->where('user_id',session('LoginId_U'))->get();

        return view('StoreElerning.Dashboard',compact('tests'));
    }
    public function propos()
      {
         return view('StoreElerning.propos');
      }
    public function contact()
      {
         return view('StoreElerning.contact');
      }
      public function signup()
      {
         $playlists = playliste::all();

         return view('StoreElerning.signup',compact('playlists'));
      }

      public function Diplôme() {
         $tests = Test::with(['user', 'playlist', 'playlist.questions'])
         ->where('user_id', session('LoginId_U'))
         ->first();

        
         $pdf = App::make('dompdf.wrapper');
         // $pdf->setPaper('A4', 'landscape'); // Set to A4 size and landscape orientation
         $pdf->setPaper([0, 0, 612, 1008]); // 8.5 inches x 14 inches (width x height)

         $pdf->loadView('diplome', ['tests' => $tests]);
         return $pdf->stream('itsolutionstuff.pdf');
      }
}


