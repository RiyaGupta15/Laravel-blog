@extends('main')
@section('content')

<div class="container-fluid">
<div class="jumbotron">
<h1>Profile</h1>
</div>

<div class="col-md-12">
<div class="row">

<div class="col-md-12">
<form action="{{ route('profile.update', Auth::user()) }}" method="post">
@csrf
{{ method_field('patch') }}
<div class="form-group form-spacing-top">
    <label for="name">Name:</label>
<input class="form-control" id="name" value="{{ $user->name }}">
</div>


<div class="form-group">
<label for="email">Email:</label>
<input class="form-control" id="email" value="{{ $user->email }}">
</div>

<div class="form-group">
<label for="created_at">Profile Created At:</label>
<input class="form-control" id="created_at" value="{{ $user->created_at->diffForHumans() }}" disabled>
</div>


<button class="btn btn-success pull-left btn-margin-right">Save Changes</button>

</form>

@endsection