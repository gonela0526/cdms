@extends(Auth::guard('admin')->check() ? 'layouts.app-admin' : 'layouts.app');

@section('content')
<div class="container">
    <h1>Blogs</h1>
    @if (count($blogs)>0)
        @foreach ($blogs as $blog)

        <div class="card" >
            <div class="card-body">
              @if (Auth::guard('admin')->check())
                <h5 class="card-title"> <a href="/admin/blogs/{{$blog->id}}">{{$blog->title}}</a></h5>
              @else
                <h5 class="card-title"> <a href="/blogs/{{$blog->id}}">{{$blog->title}}</a></h5>
              @endif
              <h6 class="card-subtitle mb-2 text-muted">Written on {{$blog->created_at}}</h6>
            </div>
          </div><br>

        @endforeach
        {{$blogs->links()}}
    @else    
      <p>No Blogs Found</p>
    @endif
</div>
@endsection
