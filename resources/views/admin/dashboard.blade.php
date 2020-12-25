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
<div class="col-md-8 col-md-offset-2">
    <button class="btn btn-primary btn-block">
        <a href="{{ route('blogs.create') }}" class="text-white">Create Blog</a>
</button>
<br>
<button class="btn btn-success btn-block">
        <a href="{{ route('admin.blogs') }}" class="text-white">Publish Blog</a>
</button>
<br>
<button class="btn btn-danger btn-block">
        <a href="{{ route('blogs.trash') }}" class="text-white">Trashed Blogs</a>
</button>
<br>
<button class="btn btn-info btn-block">
        <a href="{{ route('categories.create') }}" class="text-white">Create Categories</a>
</button>
<br>
<button class="btn btn-warning btn-block">
        <a href="{{ route('users.index') }}" class="text-white">Manage Users</a>
</button>
<br>
<button class="btn btn-link btn-block">
        <a href="{{ route('profile.index') }}" class="text-white">View / Edit profile</a>
</button>

</div>
@endif


@if(Auth::user() && Auth::user()->role_id == 2)
<div class="col-md-8 col-md-offset-2">
    <button class="btn btn-primary btn-block">
        <a href="{{ route('blogs.create') }}" class="text-white">Create Blog</a>
</button>
<br>
<button class="btn btn-warning btn-block">
        <a href="{{ route('categories.create') }}" class="text-white">Create Categories</a>
</button>
<br>
<button class="btn btn-info btn-block">
        <a href="{{ route('profile.index') }}" class="text-white">View / Edit profile</a>
</button>

</div>
@endif


@if(Auth::user() && Auth::user()->role_id == 3)
<div class="col-md-8 col-md-offset-2">
    <button class="btn btn-warning btn-block">
        <a href="{{ route('blogs') }}" class="text-white">View All Blogs</a>
</button>
<br>
<button class="btn btn-primary btn-block">
        <a href="/categories" class="text-white">View All Categories</a>
</button>
<br>
<button class="btn btn-danger btn-block">
        <a href="{{ route('profile.index') }}" class="text-white">View / Edit profile</a>
</button>


</div>
@endif


</div>
@endsection