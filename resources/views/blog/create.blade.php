@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1>Create Blog</h1>
    {!! Form::open(['action' => 'BlogsController@store','method'=>'POST','enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['id'=>'editor','class'=>'form-control','placeholder'=>'Body'])}}
        </div>

        <div class="form-group">
            {{Form::label('tags','Tags')}}
            {{Form::text('tags','',['class'=>'form-control','placeholder'=>'Tags'])}}
        </div>

        {{-- <div class="form-group">
            {{Form::file('cover_image')}}
        </div> --}}

        {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection