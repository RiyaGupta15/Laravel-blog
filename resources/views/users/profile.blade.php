@extends('main')
@section('content')

<div class="container-fluid">

    <div class="jumbotron">
        <h1>Profile</h1>
    </div>

    @if(Auth::user())

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('profile.edit', Auth::user()) }}" method="get">
                    @csrf

                        <div class="form-group form-spacing-top">
                            <label for="name">Name:</label>
                            <input class="form-control" id="name" value="{{ Auth::user()->name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" id="email" value="{{ Auth::user()->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="created_at">Profile Created At:</label>
                            <input class="form-control" id="created_at" value="{{ Auth::user()->created_at->diffForHumans() }}" disabled>
                        </div>

                        <button class="btn btn-primary pull-left btn-margin-right">Edit Profile</button>
                    </form>

                    <form action="{{ route('profile.destroy', Auth::user()) }}" method="post">
                    @csrf
                    {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger pull-left">Delete Profile</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

</div>

@endsection