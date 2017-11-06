<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/bulma.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            <div class="columns" style="margin-top: 7%">
                <div class="column is-offset-3 is-6 box">
                    {{--<div style="margin-top: 10%;" id="test" class="box">--}}
                    <h1 class="title">Make a new task</h1>
                    <input class="input" v-model="inputTask" placeholder="task">
                    <button v-on:click="makeTask(tasks)" style="margin-top: 3px" class="button is-pulled-right is-primary is-outlined">Submit</button>
                    {{--</div>--}}
                </div>
            </div>
            <div id="taskContainer" v-for="(task, index) in tasks">
                <div class="columns" style="margin-top: 1px;">
                    <div class="column box is-offset-3 is-6">
                        <div class="column">
                            <div class="is-2">
                                <input v-on:change="editTask(task.id)" :id="task.id + 'checkbox'" class="checkbox" :checked="task.checked == 1" type="checkbox">
                                <input :id="task.id + 'input'" class="input" :value="task.title">
                                <a v-on:click="deleteTask(task.id, index)" class="icon is-pulled-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <a v-on:click="editTask(task.id)" class="icon is-pulled-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <p class="subtitle is-pulled-right">@{{task.created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div id="taskContainer">--}}
                {{--@if(!empty($tasks))--}}
                {{--@foreach($tasks as $task)--}}
                        {{--<div id="task{{$task->id}}" class="columns" style="margin-top: 1px;">--}}
                            {{--<div class="column box is-offset-3 is-6">--}}
                                {{--<div class="column">--}}
                                    {{--<div class="is-2">--}}
                                        {{--<input id="{{$task->id}}checkbox" class="checkbox" @if($task->checked == 1) checked @endif type="checkbox">--}}
                                        {{--<input id="{{$task->id}}input" class="input" value="{{$task->title}}">--}}
                                        {{--<a v-on:click="deleteTask({{$task->id}})" class="icon is-pulled-right"><i class="fa fa-trash" aria-hidden="true"></i></a>--}}
                                        {{--<a v-on:click="editTask({{$task->id}})" class="icon is-pulled-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>--}}
                                        {{--<p class="subtitle is-pulled-right">19-01-12017</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            {{--</div>--}}
        </div>
    </body>
<script src="/js/app.js"></script>
</html>
