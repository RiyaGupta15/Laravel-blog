@extends('main')
@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Create a category</h1>
        <div>

        <div class="col-md-12">
            <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            {{ csrf_field("post") }} 
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <button class="btn btn-primary" type="submit">Create a new Category</button>
            </form>
        </div>
    </div>

@endsection