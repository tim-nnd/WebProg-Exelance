<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ToDo;
use App\Activity;

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
        $current = Activity::Where('user_id',Auth::id())->where('time','>',now())->orderBy('time')->get();
        $recent = Activity::Where('user_id',Auth::id())->where('time','<',now())->orderBy('time')->get();
        return view('daily_activities',compact('current','recent'));
    }

    public function toDoList(){
        if(!Auth::User()){
            return redirect('login');
        }
        $actives = ToDo::where('user_id',Auth::id())->where('deadline','>=',today())->where('status',0)->orderBy('deadline')->get();
        $done = ToDo::where('user_id',Auth::id())->where('deadline','<',today())->orWhere('status',1)->orderBy('deadline')->get();
        return view('to_do_list',compact('actives','done'));
    }

    public function toDoAdd(){
        if(!Auth::User()){
            return redirect('login');
        }
        return view('add_ToDo');
    }

    public function dailyAdd(){
        if(!Auth::User()){
            return redirect('login');
        }
        return view('add_Daily');
    }

    public function editDaily(){
        if(!Auth::User()){
            return redirect('login');
        }
        $current = Activity::Where('user_id',Auth::id())->where('time','>',now())->orderBy('time')->get();
        $recent = Activity::Where('user_id',Auth::id())->where('time','<',now())->orderBy('time')->get();
        session(['edit' => true]);
        return view('daily_activities',compact('current','recent'));
    }

    public function finishEdit(Request $request){
        $request->session()->forget('edit');
        return redirect()->route('page.daily');
    }
}
