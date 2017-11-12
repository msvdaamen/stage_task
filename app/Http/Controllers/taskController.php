<?php

namespace App\Http\Controllers;

use App\Events\TaskEvent;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class taskController extends Controller
{
    public function all(){
        $tasks = Task::all();
        return response($tasks, 200);
    }

    public function make(Request $request, Response $response){
        $task = new task();
        $task->title = $request->input('title');
        $task->checked = 0;
        $task->created_at = Carbon::now();
        $task->save();
        $this->sendMessage($task, false);
        return response($task, 200);
    }
    public function update(Request $request){
        $task = Task::where('id', $request->input('taskID'))->first();

        if (!$task) {
            return \response()->json([
                'error' => true
            ], 400);
        }

        $task->title = $request->input('title');
        $task->checked = $request->input('checked');
        $task->save();
        $this->sendMessage($task, false);
        return response()->json([
            'task' => $task
        ], 200);
    }
    public function delete(Request $request){
        Task::destroy($request->input('taskID'));
        $this->sendMessage($request->input('taskID'), true);
    }

    public function sendMessage($task, $delete){
//        $array = ['id' => 10, 'title' => 'test', 'created_at' => 'test'];
        broadcast(new TaskEvent($task, $delete))->toOthers();
    }
}
