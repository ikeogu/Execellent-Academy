<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    
    public function index(){
        $msg = Contact::all();
        return view('contact/index');
    }

    public function create(){
        return view('contact/create');
    }
    public function store(Request $request){
        $this->validate(request(),[
            'name'=>'required|string',
            'email'=>'required|string',
            'subject'=>'required|string',
            'body'=>'required|string',
        ]);

        $msg = Contact::create($request->all());
        if($msg){
            return redirect(route('contact'))->with('success','Message Sent. Admin will reply soon via Email!');
        }
        
    }

}
