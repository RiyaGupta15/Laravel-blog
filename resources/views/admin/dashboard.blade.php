@extends('main')
@section('content')

<div class="container-fluid">
    <div class="jumbotron">

    @if(Auth::user() && Auth::user()->role_id == 1)
        <h1>Admin DashBoard</h1>
    @elseif(Auth::user() && Auth::user()->role_id == 2)
        <h1>Author DashBoard</h1>
    @elseif(Auth::user() && Auth::user()->role_id == 3)
        <h1>User DashBoard</h1>
    @endif

        
</div>


@if(Auth::user() && Auth::user()->role_id == 1)
<div class="col-md-12">
    <button class="btn btn-primary">
        <a href="{{ route('blogs.create') }}" class="white-text">Create Blog</a>
</button>

<button class="btn btn-success">
        <a href="{{ route('admin.blogs') }}" class="white-text">Publish Blog</a>
</button>

<button class="btn btn-danger">
        <a href="{{ route('blogs.trash') }}" class="white-text">Trashed Blogs</a>
</button>

<button class="btn btn-info">
        <a href="{{ route('categories.create') }}" class="white-text">Create Categories</a>
</button>

<button class="btn btn-warning">
        <a href="{{ route('users.index') }}" class="white-text">Manage Users</a>
</button>

</div>
@endif


@if(Auth::user() && Auth::user()->role_id == 2)
<div class="col-md-12">
    <button class="btn btn-primary">
        <a href="{{ route('blogs.create') }}" class="white-text">Create Blog</a>
</button>

<button class="btn btn-success">
        <a href="{{ route('categories.create') }}" class="white-text">Create Categories</a>
</button>

</div>
@endif


@if(Auth::user() && Auth::user()->role_id == 3)
<div class="col-md-12">
    <button class="btn btn-primary">
        <a href="" class="white-text">What can I do</a>
</button>


</div>
@endif


</div>
@endsection