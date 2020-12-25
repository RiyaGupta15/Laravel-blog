@extends('main')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">

    <h1><strong>{{ $blog-> title}}</strong></h1>
        <br>
                    @if ($blog->featured_image)
                    <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" height="400" width="750">
                    @endif
                    <br>
                
    </div>

        @if(Auth::user())
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 && Auth::user()->id == $blog->user_id)
            
        <div class="col-md-8 col-md-offset-2">
                <a class="btn btn-primary pull-left btn-block" href="{{ route('blogs.edit', $blog->id) }}">Edit Blog</a>
                
                <form method="post" action="{{ route('blogs.delete', $blog->id) }}">
                    @csrf
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-danger pull-left btn-block">Delete Blog</button>
                </form>
                </div>
        @endif
        @endif

        <div class="col-md-8 col-md-offset-2">
        <br>
            <p>{!! ($blog->body) !!}</p>
            <br>

            @if($blog->user)
                <strong>Author: </strong> <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | <strong>Posted: </strong> {{ $blog->created_at->diffForHumans() }}
            @endif
            <hr>
            <strong>Categories</strong>
            @foreach($blog->category as $category)
            <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
            @endforeach
        <div>

    </div>

@endsection