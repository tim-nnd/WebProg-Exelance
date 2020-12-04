<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ToDo;

class ToDoController extends Controller
{
    public function add(Request $request){
        $this->_validate($request);
        $todo = new ToDo;
        $todo->user_id = Auth::id();
        $todo->name = $request->name;
        $todo->status = false;
        $todo->deadline = $request->deadline;
        $todo->save();
        return redirect()->route('page.toDo');
    }

    public function delete($id){
        $todo = ToDo::find($id);
        $todo->delete();
        return redirect()->route('page.toDo');
    }

    public function finish($id){
        $todo = ToDo::find($id);
        $todo->status = true;
        $todo->save();
        return redirect()->route('page.toDo');
    }

    private function _validate(Request $request){
        $now = today();
        $validation = $request->validate(
            [
                'name'  => 'required',
                'deadline'  => 'required|after_or_equal:'.$now,
            ],
            [
                'name.required' => 'To-Do Name must be filled',
                'deadline.required' => 'Deadline must be filled',
                'date.after_or_equal' => 'Deadline must in present date or future date',
            ]
        );
    }

}
