<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{   function listTask(){
    $list = Task::where('status', null)->paginate(3);
    return view('welcome',compact('list'));
}

    function addTask(){
        return view('task.add');
    }

    function addTaskPost(Request $request){
        $this->validate($request,[
            'title'=> 'required',
            'deadline'=> 'required',
            'description'=> 'required',
        ]);

        $tasks = new Task();
        $tasks->title = $request->title;
        $tasks->description = $request->description;
        $tasks->deadline = $request->deadline;
        if($tasks->save()){
            return redirect(route('home'))->with('success', 'Task Added successfully');
        }
        return redirect()->route('taskAdd')->with('error', 'Task not added');


    }

    function UpdateStatus($id){
        if(Task::where('id', $id)->update(['status'=>'completed'])){
            return redirect(route('home'))->with('success','Task Update successfully');
        }
        return redirect(route('home'))->with('error','error occurred while updating,try again');
    }

    function TaskDelete($id){
        if(Task::where('id', $id)->delete()){
            return redirect(route('home'))->with('success','Task Deleted successfully');
        }
        return redirect(route('home'))->with('error','error occurred while deleting,try again');

    }
    
}
