<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    function addTask(){
        return view('task.add');
    }
}
