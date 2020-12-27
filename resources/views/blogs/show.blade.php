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
                <a class="btn btn-primary pull-left btn-block form-spacing-top" href="{{ route('blogs.edit', $blog->id) }}">Edit Blog</a>
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
        <br>
        <br>
        <strong>Categories</strong>
        @foreach($blog->category as $category)
            <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
        @endforeach
        <hr>
    <div>


    <h3>Comments:</h3>
<div id="app">
<div class="media" style="margin-top:20px;" v-for="comment in comments">
    <div class="media-left">
        <a href="#">
            <img class="media-object" src="http://placeimg.com/80/80" alt="...">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">@{{comment.user.name}}</h4>
        <p>
          @{{comment.body}}
        </p>
        <span style="color: #aaa;">on @{{comment.created_at}}</span>
    </div>
</div>
<br>
<br>

<div style="margin-bottom:50px;" v-if="user">
    <textarea class="form-control" rows="3" name="body" placeholder="Leave a comment" v-model="commentBox"></textarea>
    <button class="btn btn-success" style="margin-top:10px" @click.prevent="postComment">Save Comment</button>
</div>

<div v-else>
    <h4>You must be logged in to submit a comment!</h4> 
    @csrf
    <form action="{{route('login') }}">
        <button type="submit" class="btn btn-primary">Login Now</button>
</form>
</div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    var app = new Vue ({
        el: "#app",
        data: {
            comments: {},
            commentBox: '',
            blog: {!! $blog->toJson() !!},
            user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!}
        },
        mounted() {
            this.getComments();
        },
        methods: {
            getComments() {
                  axios.get(`/api/blogs/${this.blog.id}/comments`)
                       .then((response) => {
                           this.comments = response.data
                       })
                       .catch(function (error) {
                           console.log(error);
                       });
              },
              postComment() {
                  axios.post(`/api/blogs/${this.blog.id}/comment`, {
                      api_token: this.user.api_token,
                      body: this.commentBox
                  })
                  .then((response) => {
                      this.comments.unshift(response.data);
                      this.commentBox = '';
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
              }
        }
    });
    </script>

@endsection
