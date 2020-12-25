@extends('main')
@section('content')

<div class="container-fluid">
<div class="jumbotron">

<h1>{{ $category->name }}</h1>

<div class="brn-group">
<a href = "{{ route('categories.edit', $category->id) }}" class= "btn btn-warning">Edit</a>

<form method="post" action = "{{ route('categories.destroy', $category->id) }}">
@csrf
{{ method_field('delete') }}
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</div>

</div>

<div class="col-md-12">
@foreach($category->blog as $blog)
<h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
@endforeach
</div>

</div>


@endsection