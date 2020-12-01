@extends('layouts.app')

@section('content')
    
    <h1>Feladatok</h1>
    Kész {{ Form::radio('Finished', 'Kész',true) }}
    Folyamatban{{ Form::radio('Finished', 'Folyamatban',false) }}

    @if(count($tasks) > 0)
        @foreach ($tasks as $task)
            <div class="well">
            <h3><a href="/tasks/{{$task->id}}">{{$task->task_title}}</a></h3>
                <small>{{$task->task_content}}</small>
            </div>
        @endforeach
        {{$tasks->links()}}
    @else
        <p> Nem találhatóak feladatok</p>
    @endif 
@endsection