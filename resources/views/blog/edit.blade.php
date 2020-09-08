@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1>Create Blog</h1>
    {!! Form::open(['action' => ['BlogsController@update',$blog->id],'method'=>'POST','enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$blog->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        

        <div class="form-group">
            {{Form::label('tags','Tags')}}
            {{Form::text('tags',$blog->tags,['class'=>'form-control','placeholder'=>'Tags'])}}
        </div>


        <div class="form-group">
            {{Form::label('contents','Body')}}
            {{Form::textarea('contents',Storage::get('public/blog_files/'.$blog->body_file_name),['id'=>'editor','class'=>'form-control','placeholder'=>'Body'])}}
        </div>
        
        {{-- <div class="form-group">
            {{Form::file('body_file')}}
        </div> --}}

        {{Form::hidden('_method','PUT')}}
        {{Form::submit('update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection