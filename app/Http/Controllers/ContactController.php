<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function index(){


        return view('contact');
    }

    public function store(Request $request){
      $data=  $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);

        Mail::to('rachimaxi22@gmail.com')->send(new Contact($data));
        return redirect(route('home.contact'))->with('status','Thank you for emial');
    }
}
