@extends('layouts.app')

@section('content')
    <a href="/tasks" class="btn btn-default">Vissza</a>
    <h1>{{$task->task_title}}</h1>
    <small>{{$task->task_content}}</small>
    <hr>
    @if($task->isFinished == 0)
        <small>Folyamatban</small>
    @else
        <small>Kész</small>
    @endif
    <hr>
    <small>Módosítva: {{$task->updated_at}}</small>
    <hr>
    <a href="/tasks/{{$task->id}}/edit" class="btn btn-default">Módosít</a>

    {!! Form::open(['action' => ['App\Http\Controllers\TaskController@destroy', $task->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
    {{ Form::hidden('_method','DELETE') }}
    {{ Form::submit('Törlés',['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}

@endsection