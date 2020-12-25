@extends('main')
@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
    <div class="jumbotron2">
    <div class="text-spacing">
        <br>
        <h1><strong>Categories</strong></h1>
        <p><strong>We have some amazing categories to make the perfect blog!!!</strong></p>
        <br>
    </div>  
    </div>
    <br>
    <br>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Category Name</th>
                    <th></th>
                    <th></th>
                    <th>Category Slug</th>
                </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></th>
                <th></th>
                <th></th>
                <td>{{ $category->slug }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>

@endsection