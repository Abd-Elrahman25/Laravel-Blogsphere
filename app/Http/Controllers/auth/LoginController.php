<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct(){
        $this->middleware(['guest']);
    }
    
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        request()->validate([
            'email'=>'required|email|max:255',
            'password'=>'required',
        ]);

        auth()->attempt($request->only('email','password'));

        if(!auth()->attempt($request->only('email','password'))){

            return back()->with('status','Invalid login details');


        }


        return redirect()->route('posts.index');
    }
}
