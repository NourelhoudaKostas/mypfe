<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    //
    public function contact(request $request) {

        Mail::to($request->email)->send(new Contact ($request->all()));
            return back()->with('success','vote message');

    }
}
