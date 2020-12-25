@extends('main')
@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <img src="./images/featured_image/contact.jpg" alt="Blog" height="230" width="750"><br><br>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
            <form method="post"  action="{{ route('mail.send') }}">
                @csrf
                <div class="form-group">
                   <label for="name">Title</label>
                   <input type="text" name="name" class="form-control" value="{{ old('name') }}">
               </div>

               <div class="form-group">
                   <label for="email" class="form-spacing">Email</label>
                   <input type="email" name="email" class="form-control" value="{{ old('email') }}">
               </div>

               <div class="form-group">
                   <label for="subject" class="form-spacing">Subject</label>
                   <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
               </div>

               <div class="form-group">
                   <label for="message" class="form-spacing">Message</label>
                   <textarea name="mail_message" class="form-control my-editor">{{ old('mail_message') }}</textarea>
               </div>

               <div>
                <button class="btn btn-primary" type="submit">Say Hi</button>
              </div>

            </form>

        </div>
    </div>


@endsection
