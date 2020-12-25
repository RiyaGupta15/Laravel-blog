@extends('main')
@section('content')

<div class="container">
@foreach($blogs as $blog)
<div class="col-md-8 offset-md-2">
    <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>
    
    <div class="col-md-12">
                    @if ($blog->featured_image)
                    <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" class="img-responsive featured_image" style="width:300px; height:auto;">
                    <br>
                    @endif
                </div>
    
    <div class="lead">{{ Str::limit($blog->body, 100) }}</div>

    @if($blog->user)
    Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }}
    @endif
</div>
<br><hr><br>
@endforeach
</div>

@endsection