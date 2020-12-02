<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function login(){
        //Validasi udah ada yg login apa belom
        if(Auth::User()){
            return redirect('/');
        }
        return view('login');
    }

    public function register(){
        //Validasi udah ada yg login apa belom
        if(Auth::User()){
            return redirect('/');
        }
        return view('register');
    }
}
