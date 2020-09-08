@extends(Auth::guard('admin')->check() ? 'layouts.app-admin' : 'layouts.app');

@section('content')
<div class="container">
     @if (Auth::guard('admin')->check())
       <a href="{{url('/admin/blogs/')}}" class="btn btn-default">Go Back</a> <br> <br>
     @else
       <a href="{{url('blogs/')}}" class="btn btn-default">Go Back</a> <br> <br>    
     @endif
     

    <div class="card" >
            <div class="card-body">
              <h5 class="card-title">{{$blog->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Written on {{$blog->created_at}} </h6>
              <div class="card-text">{!!Storage::get('public/blog_files/'.$blog->body_file_name)!!}</div> 
              @if (Auth::guard('admin')->check())
              <a href="{{ url('admin/blogs/'.$blog->id.'/edit')}}" class="btn btn-primary">Edit</a>
              {!! Form::open(['action' => ['BlogsController@destroy',$blog->id],'method' => 'POST', 'class' => 'float-right']) !!}
              {{Form::hidden('_method','DELETE')}}
              {{Form::submit('Delete',['class'=> 'btn btn-danger'])}}
              {!! Form::close() !!}
              @endif
            </div>
          </div><br>
</div>
@endsection
