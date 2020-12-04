<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Activity;

class DailyController extends Controller
{
    public function add(Request $request){
        $this->_validation($request);
        $activity = new Activity;
        $activity->name = $request->name;
        $activity->user_id = Auth::id();
        $activity->time = $request->time;
        $activity->description = $request->description;
        $activity->photo = $request->category;
        $activity->save();
        return redirect()->route('page.daily');
    }

    public function delete($id){
        $activity = Activity::find($id);
        $activity->delete();
        return redirect()->route('page.daily');
    }

    private function _validation(Request $request){
        $validation = $request->validate(
            [
                'name'  => 'required',
                'description'  => 'required',
                'category'  => 'required',
                'time' => 'required'
            ],
            [
                'name.required' => 'Activity Name must be filled',
                'description.required' => 'Description must be filled',
                'category.required' => 'Category must be filled',
                'time.required' => 'Time must be filled',
                ]
        );
    }
}
