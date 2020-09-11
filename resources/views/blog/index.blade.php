@extends(Auth::guard('admin')->check() ? 'layouts.app-admin' : 'layouts.app')
<style>
  .pagination{
    align-content: right;
  }
</style>
@section('content')
<div class="container">
    <h1>Blogs</h1>



    @if (count($blogs)>0)

    <div class="card-columns">

       @foreach ($blogs as $blog)

        <div class="card">
          <img class="card-img-top" style = "height: 250px;" src="/storage/images/images.jpeg" alt="Card image cap">
          <div class="card-body">
            @if (Auth::guard('admin')->check())
                  <h5 class="card-title"> <a href="/admin/blogs/{{$blog->id}}">{{$blog->title}}</a></h5>
                @else
                  <h5 class="card-title"> <a href="/blogs/{{$blog->id}}">{{$blog->title}}</a></h5>
                @endif
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Written on {{$blog->created_at}} </small></p>
          </div>
        </div>
        @endforeach
        {{$blogs->links()}}
    @else
      <p>No Blogs Found</p>
    @endif
</div>
@endsection
