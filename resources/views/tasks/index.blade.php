@extends('layouts.app')

@section('content')
    
    <h1>Feladatok</h1>
    {{ Form::checkbox('isFinished',null,['onchange'=>'App\Http\Controllers\TaskController@index']) }}

    @if(count($tasks) > 0)
        @foreach ($tasks as $task)
            <div class="well">
            <h3><a href="/tasks/{{$task->id}}">{{$task->task_title}}</a></h3>
                <small>{{$task->task_content}}</small>
                @if($task->isFinished)
                @else
                @endif
                <div>Módosítva:{{$task->create_at}}</div>
            </div>
        @endforeach
        
    @else
        <p> Nem találhatóak feladatok</p>
    @endif 
@endsection