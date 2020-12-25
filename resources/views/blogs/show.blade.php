@extends('main')
@section('content')

    <div class="container-fluid">

    <article>
    <div class="jumbotron">

                <div class="col-md-12">
                    @if ($blog->featured_image)
                    <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" class="img-responsive featured_image">
                    <br>
                    @endif
                </div>

        <h1>{{ $blog-> title}}</h1>


        @if(Auth::user())
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 && Auth::user()->id == $blog->user_id)
            <div class="row">
                <div class="col-md-12">  
                <a class="btn btn-primary pull-left" href="{{ route('blogs.edit', $blog->id) }}">Edit </a>
                <form method="post" action="{{ route('blogs.delete', $blog->id) }}">
                    @csrf
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-danger pull-left">Delete</button>
                </form>
                </div>
             </div>
             @endif
             @endif

        <div class="col-md-12">
            <p>{{ $blog-> body }}</p>

            @if($blog->user)
                Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }}
            @endif
            <hr>
            <strong>Categories</strong>
            @foreach($blog->category as $category)
            <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
            @endforeach
        <div>
 

    </article>

    </div>

@endsection