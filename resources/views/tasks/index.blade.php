@extends('layouts.app')

@section('content')
    
    <h1>Feladatok</h1>
    {!! Form::open([]) !!}
        {{ Form::checkbox('isFinished',null,['onchange'=>'App\Http\Controllers\TaskController@index']) }}
    {!! Form::close() !!}
    @if(count($tasks) > 0)
        @foreach ($tasks as $task)
            <div class="well">
            <h3><a href="/tasks/{{$task->id}}">{{$task->task_title}}</a></h3>
                <small>{{$task->task_content}}</small>
                @if($task->isFinished = 0) <div>Állapot: Kész</div>
                @else <div>Állapot: Folyamatban</div>
                @endif
                <hr> 
                <div>Módosítva:{{$task->created_at}}</div>
            </div>
            <hr>
        @endforeach
        
    @else
        <p> Nem találhatóak feladatok</p>
    @endif 
@endsection