<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
    * Display ALL Tasks
    **/ 
    public function index() 
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('task', ['tasks' => $tasks]);
    }

    /**
    * Add a new Task
    */

    public function newTask(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required|max:255',]);

        if ($validator->fails()) 
        {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');

    }


}