<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;

class ToDoController extends Controller
{
    public function add(Request $request){
        // $todo = new ToDo;
        // $todo->user_id = Auth::id();
        // $todo->name = $request->name;

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
}
