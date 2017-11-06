<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class homeController extends Controller
{
    public function home(){
        $tasks = Task::all();
        return view('home')->with('tasks', $tasks);
    }
}
