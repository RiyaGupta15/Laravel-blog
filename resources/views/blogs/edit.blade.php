@extends('main')
@section('stylesheets')

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
                <h1><b>Edit</b><br><h1>
                    <h3>Title - {{ $blog->title }}</h3>
                <br>
            </div>
        </div>

        <hr>

        <div class = "col-md-10 col-md-offset-1">
            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" data-parsley-validate = "" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}

                <div class="form-group">
                    <label for="title" class="form-spacing-top">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                </div>

                <div class="form-group">
                    <label for="body" class="form-spacing">Body</label>
                    <textarea name="body" class="form-control">{{ $blog->body}}</textarea>
                <div>

                <label for="category_id" class='form-spacing-top'>Categories</label>
                <select class="form-control select2-multi" name="category_id[]" multiple>
                    @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <div class="form-group">
                    <label for="featured_image" class="form-spacing">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control">
                </div>

                <button class="btn btn-primary" type="submit">Update blog</button>

            </form>
        </div>
</div>

@endsection

@section('scripts')
<script src="{{URL::asset('js/select2.min.js')}}"></script>
<script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($blog->category()->allRelatedIds()) !!}).trigger('change');
</script>
@endsection
