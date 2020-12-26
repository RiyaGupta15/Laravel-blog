@extends('main')
@section('title', '| All Blogs')
@section('content')

<div class="container">

    <div class="row">
        <div class=" jumbotron2 col-md-10 col-md-offset-1">
            <div class="text-spacing">
                <h1><strong>All Blog Posts!</strong></h1>
                <p>Read all blog posts from different users that have been posted!</p>
                <p>Hope you enjoy reading these :)</p><br>
            </div>
        </div>
    </div>

    <br>

    @foreach($blogs as $blog)

        <div class="row">
            <div class="col-md-10 col-md-offset-1 form-spacing-top">
                <h3><strong><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></strong></h2>
                <br>
    
                <div class="col-md-6">
                    @if ($blog->featured_image)
                        <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" class="img-responsive featured_image" style="width:300px; height:200px;">
                        <br>
                    @endif
                </div>


                <div class="col-md-6">
                    <div class="lead">{{ Str::limit(strip_tags(html_entity_decode($blog->body)), 200) }}
                    </div>

                @if($blog->user)
                    <i>Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }}</i>
                @endif
            </div>
        </div>

    @endforeach

    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    {{ $blogs -> links()}}
                </div>
            </div>
        </div>
    </div>
    
@endsection