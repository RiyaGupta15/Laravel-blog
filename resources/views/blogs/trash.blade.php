@extends('main')
@section('content')

<div class="row">
    <div class="jumbotron">
        <h1>Trashed Blogs</h1>
    </div>

<div class="col-md-10 col-md-offset-1">
@foreach($trashedBlogs as $blog)
    <h2>{{ $blog->title }}</h2>
    <p>{{ $blog->body }}</p>

<div class="col-md-1">
<form method="get" action="{{ route('blogs.restore', $blog->id) }}">
    @csrf
    {{ csrf_field("get") }} 
    <button class="btn btn-success pull-left" type="submit">
    Restore
  
</button>
</form>
</div>

<div class="col-md-1">
<form method="post" action="{{ route('blogs.permanent-delete', $blog->id) }}">
    @csrf
    {{ method_field('delete') }}
    <button class="btn btn-danger pull-left" type="submit">
        Delete
</button>
</form>
</div>
<br>
<br>
@endforeach
</div>
</div>

@endsection