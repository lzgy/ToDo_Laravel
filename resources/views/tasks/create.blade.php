@extends('layouts.app')

@section('content')
    <h1>Feladat hozzáadása</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\TaskController@store' , 'method' => 'POST']) !!}
        <div class = "form-group">
            {{ Form::label('title', 'Feladat:') }}
            {{ Form::text('task_title', '', ['class' => 'form-control', 'placeholder' => 'Feladat neve']) }}
        </div>
        <div class="form-group">
            <div>{{ Form::label('content','Feladat leírása:') }}</div>
            {{ Form::textarea('task_content','', ['class'=>'form-control','placeholder'=>'Feladat tartalma']) }}
        </div>
        {{ Form::submit('Hozzáad',['class' =>'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection


