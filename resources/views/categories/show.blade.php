@extends('main')
@section('content')

<div class="container-fluid">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-10">
                <h2><strong>{{ $category->name }} Category</strong></h2>
                <h3> Below you can read all the posts from this category</h3>
            </div>

            @if(Auth::user())
            @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)

            <div class="col-md-1">
                <a href = "{{ route('categories.edit', $category->id) }}" class= "btn btn-warning btn-block">Edit</a>
            </div>

            <div class="col-md-1">
                <form method="post" action = "{{ route('categories.destroy', $category->id) }}">
                @csrf
                {{ method_field('delete') }}
                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                </form>
            </div>

            @endif
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Blog Title Name</th>
                    <th></th>
                    <th>Blog Author</th>
                    <th></th>
                    <th>Blog Created At</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($category->blog as $blog)
                <tr>
                    <th></th>
                    <th><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></th>
                    <th></th>
                    <td>{{ $blog->user->name }}</td>
                    <th></th>
                    <td>{{ $blog->created_at->diffForHumans() }}</td>
                    <th></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection