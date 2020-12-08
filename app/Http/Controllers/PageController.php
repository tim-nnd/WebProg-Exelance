<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ToDo;
use App\Activity;
use App\Team;
use App\TeamDetail;
use App\Meeting;
use App\User;

class PageController extends Controller
{
    public function home()
    {
        if(!Auth::User()) return redirect('login');

        $user = User::find(Auth::id());
        return view('home',compact('user'));
    }

    public function login()
    {
        //Validasi udah ada yg login apa belom
        if (Auth::User()) {
            return redirect('/');
        }
        return view('login');
    }

    public function register()
    {
        //Validasi udah ada yg login apa belom
        if (Auth::User()) {
            return redirect('/');
        }
        return view('register');
    }

    public function daily()
    {
        if (!Auth::User()) {
            return redirect('login');
        }
        $current = Activity::Where('user_id', Auth::id())->where('time', '>', now())->orderBy('time')->get();
        $recent = Activity::Where('user_id', Auth::id())->where('time', '<', now())->orderBy('time')->get();
        return view('daily_activities', compact('current', 'recent'));
    }

    public function toDoList()
    {
        if (!Auth::User()) {
            return redirect('login');
        }
        $this->_changeStatus();
        $actives = ToDo::where('user_id', Auth::id())->where('deadline', '>=', today())->where('status', 0)->orderBy('deadline')->get();
        $done = ToDo::where('user_id', Auth::id())->where('status', 1)->orderBy('deadline')->get();
        return view('to_do_list', compact('actives', 'done'));
    }

    private function _changeStatus(){
        $lewat = ToDo::where('deadline','<',today())->where('status', 0)->get();
        foreach($lewat as $l){
            $l->status = 1;
            $l->save();
        }
    }

    public function toDoAdd()
    {
        if (!Auth::User()) {
            return redirect('login');
        }
        return view('add_ToDo');
    }

    public function dailyAdd()
    {
        if (!Auth::User()) {
            return redirect('login');
        }
        return view('add_Daily');
    }

    public function editDaily()
    {
        if (!Auth::User()) {
            return redirect('login');
        }
        $current = Activity::Where('user_id', Auth::id())->orderBy('time')->get();
        $recent = Activity::Where('user_id', Auth::id())->where('time', '<', now())->orderBy('time')->get();
        session(['edit' => true]);
        return view('daily_activities', compact('current', 'recent'));
    }

    public function finishEdit(Request $request)
    {
        $request->session()->forget('edit');
        return redirect()->route('page.daily');
    }

    public function toBoards()
    {
        if(!Auth::User()) return redirect('login');
        $teamdetail = TeamDetail::where('user_id', Auth::id())->get();
        return view('team_boards', compact('teamdetail'));
    }

    public function teamDetails($id)
    {
        if(!Auth::User()) return redirect('login');
        $team = Team::where('id',$id)->first();
        return view('team_details', compact('team'));
    }

    public function teamQuestion($id)
    {
        if(!Auth::User()) return redirect('login');
        $meeting = Meeting::where('id',$id)->first();
        return view('team_question', compact('meeting'));
    }
}
