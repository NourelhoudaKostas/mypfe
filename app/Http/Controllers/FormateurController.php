<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Http\Requests\StoreFormateurRequest;
use App\Http\Requests\UpdateFormateurRequest;

class FormateurController extends Controller
{
    public function Formateur_view()
    {
        $id = session('LoginId_F');
        $formateur = Formateur::find($id);
        return view('formateur.dashbord_formateur', compact('formateur'));
    }
    public function profile_Formateur()
    {
        $id = session('LoginId_F');
        $formateur = Formateur::find($id);
        return view('formateur.profile', compact('formateur'));
    }
}
