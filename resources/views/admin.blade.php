@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>You are logged in as <strong>Admin</strong>!</p>
                    <a href="{{url('/admin/blogs/')}}" class="btn btn-primary">Blogs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
