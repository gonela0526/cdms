@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1>Blogs</h1>
    @if (count($blogs)>0)
        @foreach ($blogs as $blog)

        <div class="card" >
            <div class="card-body">
              <h5 class="card-title">{{$blog->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Written on {{$blog->created_at}} by {{$blog->admin->name}}</h6>
            </div>
          </div><br>

        @endforeach
        {{$blogs->links()}}
    @else    
      <p>No Blogs Found</p>
    @endif
</div>
@endsection
