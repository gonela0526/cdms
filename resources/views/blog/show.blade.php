@extends('layouts.app-admin')

@section('content')
<div class="container">
     <a href="{{url('/admin/blogs/')}}" class="btn btn-default">Go Back</a> <br> <br>

    <div class="card" >
            <div class="card-body">
              <h5 class="card-title">{{$blog->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Written on {{$blog->created_at}} by {{$blog->admin->name}}</h6>
              <p class="card-text">{!!$blog->body!!}</p>
              <a href="" class="btn btn-primary">Edit</a>
              <a href="" class="btn btn-danger ">Delete</a>
            </div>
          </div><br>
</div>
@endsection
