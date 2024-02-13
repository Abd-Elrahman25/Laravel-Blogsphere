<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct(){
        $this->middleware(['guest']);
    }
    
    public function index(){
        return view('auth.register');
    }

    public function store(){
        request()->validate([
            'full_name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
        ]);
        
        $full_name = request()->full_name;
        $email = request()->email;
        $password = request()->password;

        user::create([
            'name'=>$full_name,
            'email'=>$email,
            'password'=>Hash::make($password),
        ]);
        
        return redirect()->route('login')->with('success', 'Sign up successful! Please log in.');
    }
}
