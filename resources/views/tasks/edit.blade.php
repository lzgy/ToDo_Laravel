@extends('layouts.app')

@section('content')
    <h1>Feladat Módosítása</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\TaskController@update', $task->id] , 'method' => 'PUT']) !!}
        <div class = "form-group">
            {{ Form::label('title', 'Feladat:') }}
            {{ Form::text('task_title', $task->task_title, ['class' => 'form-control', 'placeholder' => 'Feladat']) }}
        </div>
        <div class="form-group">
            <div>{{ Form::label('content','Feladat leírása:') }}</div>
            {{ Form::textarea('task_content',$task->task_content, ['class'=>'form-control','placeholder'=>'Feladat tartalma']) }}
        </div>
        <div class="form-group">
            <div>{{ Form::label('content','Állapot:') }}</div>
            @if ($task->isFinished == 0)
                {{ Form::checkbox('isFinished',$task->isFinished, false) }}
            @else {{ Form::checkbox('isFinished',$task->isFinished, true) }}
            @endif
        </div>
        {{ Form::hidden('_method','PUT') }}
        {{ Form::submit('Módosít',['class' =>'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
