<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MeetingDetail;
use App\TeamDetail;
use Carbon\Carbon;
use App\TeamUpdate;
use App\User;
use App\Team;
use App\Notification;
use App\Resource;
use App\TeamToDo;
use App\Meeting;
use App\Invitation;

class TeamController extends Controller
{
    public function postReply(Request $request,$id){
        $this->_validate($request);
        $reply = new MeetingDetail;
        $reply->user_id = Auth::id();
        $reply->content = $request->reply;
        $reply->meeting_id = $id;
        $reply->created_at = now();
        $reply->save();
        return redirect()->route('page.teamQuestion',$id);
    }

    public function deleteMember(Request $request, $id){
        $team_id = $request->session()->get('team');
        //Bikin Notifikasi ke user yg di kick
        $notification = new Notification;
        $notification->created_at = now();
        $notification->user_id = $id;
        $notification->message = Auth::User()->name.' has removed you from '. Team::find($team_id)->team_name;
        $notification->save();

        //Bikin updates ke team
        $tu = new TeamUpdate;
        $tu->team_id = $team_id;
        $tu->message = Auth::User()->name.' has removed '. User::find($id)->name . ' from '. Team::find($team_id)->team_name;
        $tu->user_id = Auth::id();
        $tu->created_at = now();
        $tu->save();

        $delete = TeamDetail::where('user_id',$id)->where('team_id',$team_id);
        $delete->delete();
        return redirect()->route('page.teamDetails',$team_id);
    }

    public function postResources(Request $request){
        $this->_validatePost($request);
        $team_id = $request->session()->get('team');
        $r = new Resource;
        $r->title = $request->description;
        $r->content = $request->link;
        $r->created_at = now();
        $r->team_id = $team_id;
        $r->save();
        
        return redirect()->route('page.teamDetails',$team_id);
    }

    public function postTask(Request $request){
        $this->_validateTask($request);
        $team_id = $request->session()->get('team');
        $t = new TeamToDo;
        $t->title = $request->title;
        $t->content = $request->content;
        $t->deadline = $request->deadline;
        $t->team_id = $team_id;
        $t->status = 0;
        $t->save();

        $tu = new TeamUpdate;
        $tu->team_id = $team_id;
        $tu->user_id = Auth::id();
        $tu->message = 'Post a new Task';
        $tu->created_at = now();
        $tu->save();
        return redirect()->route('page.teamDetails',$team_id);
    }

    public function postQuestion(Request $request){
        $this->_validateQuestion($request);
        $team_id = $request->session()->get('team');
        $m = new Meeting;
        $m->title = $request->title;
        $m->content = $request->description;
        $m->created_at = now();
        $m->team_id = $team_id;
        $m->user_id = Auth::id();
        $m->save();

        $tu = new TeamUpdate;
        $tu->team_id = $team_id;
        $tu->user_id = Auth::id();
        $tu->message = 'Post a new Question';
        $tu->created_at = now();
        $tu->save();
        $qna_id = Meeting::all()->sortByDesc('id')->first();
        return redirect()->route('page.teamQuestion',$qna_id);
    }

    private function _validateQuestion(Request $request){
        $validation = $request->validate(
            [
                'description'  => 'required',
                'title' => 'required',
            ],
        );
    }

    public function finishTask($id){
        $t = TeamToDo::find($id);
        $t->status = 1;
        $t->save();
        return redirect()->route('page.teamToDo',$id);
    }

    public function deleteTask(Request $request,$id){
        $team_id = $request->session()->get('team');
        $t = TeamToDo::find($id);
        $t->delete();
        return redirect()->route('page.teamDetails',$team_id);
    }

    public function invite(Request $request){
        $this->_validateInvite($request);
        $team_id = $request->session()->get('team');
        $toInvite = User::Where('email',$request->email)->first();
        if($toInvite){
            if($toInvite->teamdetails->where('team_id',$team_id)->first()) return redirect()->route('page.invite')->with('failed',$toInvite->name. ' already in the team');
            $invitation = new Invitation;
            $invitation->message = $request->message;
            $invitation->created_at = now();
            $invitation->user_id = $toInvite->id;
            $invitation->team_id = $team_id;
            $invitation->status = 0;
            $invitation->save();
            return redirect()->route('page.invite')->with('success','You have invited '. $toInvite->name);
        }
        return redirect()->route('page.invite')->with('failed','User not Found');
    }

    public function accept($id){
        $invitation = Invitation::find($id);
        $invitation->status = 1;
        $td = new TeamDetail;
        $td->user_id = Auth::id();
        $td->team_id = $invitation->team_id;
        $td->role_id = 2;
        $td->save();
        $invitation->save();
        return redirect()->route('boards.team');
    }

    public function createTeam(Request $request){
        $this->_validateTeam($request);
        $t = new Team;
        $img = $request->file('img');
        $t->team_name = $request->name;
        $t->team_img = $img->getClientOriginalName();
        $img->move('assets/img/luar/team',$img->getClientOriginalName());
        $t->save();

        $t = Team::all()->sortByDesc('id')->first();

        $td = new TeamDetail;
        $td->user_id = Auth::id();
        $td->team_id = $t->id;
        $td->role_id = 1;
        $td->save();
        return redirect()->route('boards.team');
    }

    public function decline($id){
        $invitation = Invitation::find($id);
        $invitation->status = 1;
        $invitation->save();
        return redirect()->route('page.home');
    }

    private function _validateTeam(Request $request){
        $validation = $request->validate(
            [
                'name'  => 'required',
                'img' => 'required|mimes:jpg,png,jpeg',
            ],
            [
                'name.required'  => 'Team Name cannot be empty',
                'img.required'  => 'Team Image cannot be empty',
                'img.mimes'  => 'Team Image only accept jpg, png, jpeg',
            ]
        );
    }

    private function _validateInvite(Request $request){
        $validation = $request->validate(
            [
                'email'  => 'required',
            ],
            [
                'email.required'  => 'Email cannot be empty',
            ]
        );
    }

    private function _validatePost(Request $request){
        $validation = $request->validate(
            [
                'description'  => 'required',
                'link' => 'required',
            ],
        );
    }

    private function _validateTask(Request $request){
        $now = today();
        $validation = $request->validate(
            [
                'content'  => 'required',
                'title' => 'required',
                'deadline' => 'required|after_or_equal:'.$now,
            ],
        );
    }

    private function _validate(Request $request){
        $validation = $request->validate(
            [
                'reply'  => 'required',
            ],
        );
    }
}
