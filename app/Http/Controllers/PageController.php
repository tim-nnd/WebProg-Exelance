<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ToDo;

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
        $actives = ToDo::where('user_id',Auth::id())->where('deadline','>=',now())->where('status',0)->get();
        $done = ToDo::where('user_id',Auth::id())->where('status',1)->get();
        return view('to_do_list',compact('actives','done'));
    }

    public function toDoAdd(){
        if(!Auth::User()){
            return redirect('login');
        }
        return view('add_ToDo');
    }
}
