@extends('main')
@section('content')

<div class="container-fluid">
    <div class="jumbotron">
        <h1>Trashed Blogs</h1>
</div>
</div>

<div class="col-md-12">
@foreach($trashedBlogs as $blog)
    <h2>{{ $blog->title }}</h2>
    <p>{{ $blog->body }}</p>

    <div>

<form method="get" action="{{ route('blogs.restore', $blog->id) }}">
    @csrf
    {{ csrf_field("get") }} 
    <button class="btn btn-success pull-left" type="submit">
    Restore
</button>
</form>


<form method="post" action="{{ route('blogs.permanent-delete', $blog->id) }}">
    @csrf
    {{ method_field('delete') }}
    <button class="btn btn-danger pull-left" type="submit">
    Permanent Delete
</button>
</form>
</div>
@endforeach
</div>

@endsection