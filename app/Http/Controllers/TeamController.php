<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MeetingDetail;
use Carbon\Carbon;

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

    private function _validate(Request $request){
        $validation = $request->validate(
            [
                'reply'  => 'required',
            ],
        );
    }
}
