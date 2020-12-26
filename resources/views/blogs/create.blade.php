@extends('main')
@section('stylesheets')

<link rel="stylesheet" href="{{URL::asset('css/parsley.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/select2.min.css')}}">
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'link code',
        menubar: false
    })
</script>
@endsection

@section('content')

<div class = "row">

    <div class=" jumbotron2 col-md-10 col-md-offset-1">
        <div class="text-spacing">
            <h1><b>Create your own Blog <br> </b></h1>
            <h3>Happy Blogging :)</h3>
            <br>
        </div>
    </div>

    <hr>

    <div class = "col-md-10 col-md-offset-1">
        <form action="{{ route('blogs.store') }}" method="POST" data-parsley-validate = "" enctype="multipart/form-data" >
        @csrf

            <div class="form-group">
                <label for="title" class="form-spacing-top">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="body" class="form-spacing">Body</label>
                <textarea name="body" class="form-control"></textarea>
            <div>

            <div class="form-group form-check form-check-inline">
                <label for="category_id" class="form-spacing">Categories:</label>
                <select class="form-control select2-multi" name="category_id[]" multiple>
                    @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="featured_image" class="form-spacing">Featured Image</label>
                <input type="file" name="featured_image" class="form-control">
            </div>

            <button class="btn btn-primary" type="submit">Create a new blog</button>
            
        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{URL::asset('js/parsley.min.js')}}"></script>
    <script src="{{URL::asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection
