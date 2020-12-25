@extends('main')
@section('content')

<div class="container-fluid">
<div class="jumbotron">
<h1>Manage Blogs</h1>
</div>

<div class="row">
<div class="col-md-6">
<h3>Published</h3>
<hr>
    @foreach($publishedBlogs as $blog)
        <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
        <p>{{ Str::limit($blog->body, 150) }}</p>


        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}

            <input name="status" type="checkbox" value="0" checked style="display:none">
            <button type="submit" class="btn btn-warning">Save as draft</button>

            </form>
    @endforeach
</div>

<div class="col-md-6">
<h3>Drafts</h3>
<hr>
    @foreach($draftedBlogs as $blog)
        <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
        <p>{{ Str::limit($blog->body, 150) }}</p>


        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}

            <input name="status" type="checkbox" value="1" checked style="display:none">
            <button type="submit" class="btn btn-success">Publish</button>

            </form>
    @endforeach

</div>
</div>
</div>


@endsection