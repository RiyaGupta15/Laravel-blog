@extends('main')
@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Edit Category</h1>
        <div>


        <div class="col-md-12">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            {{ method_field('patch') }}
                <div class="form-group">
                    <label for="name" class="form-spacing-top">Name</label>
                    <input type="text" name="name" class="form-control form-spacing" value="{{ $category->name }}">
                </div>

                <button class="btn btn-primary form-spacing" type="submit">Edit Category</button>
            </form>
        </div>
</div>

@endsection