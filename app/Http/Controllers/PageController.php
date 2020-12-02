<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(){
        return view('home');
    }

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

    public function daily(){
        if(!Auth::User()){
            return redirect('login');
        }
        return view('daily_activities');
    }

    public function toDoList(){
        if(!Auth::User()){
            return redirect('login');
        }
        return view('to_do_list');
    }
}
