@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection
@section('main')
@include('sweetalert::alert')

<main class="container" style="background-color: #fff;">
    <section id="contact-us">
        <h1 style="padding-top: 50px;">Edit New Post!</h1>
      
        <!-- Contact Form -->
        <div class="contact-form">
            <form action="{{route('blog.update',$post)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <!-- Title -->
                <label for="title"><span>Title</span></label>
                <input type="text" id="title" name="title" value="{{$post->title}}" />
                @error('title')
                <div style="color: red;">{{ $message }}</div>
                @enderror
                <!-- Image -->
                <label for="image"><span>Image</span></label>
                <input type="file" id="image" name="image" />
                @error('image')
                <div style="color: red;">{{ $message }}</div>
                @enderror

                <!-- Drop down -->
               {{--  <label for="categories"><span>Choose a category:</span></label>
                <select name="category_id" id="categories">
                    <option selected disabled>Select option </option>
                        <option value=""></option>
                </select> --}}
          

                <!-- Body-->
                <label for="body"><span>Body</span></label>
                <textarea id="body" name="body">{{$post->body}}</textarea>
                @error('body')
                <div style="color: red;">{{ $message }}</div>
                @enderror
                <!-- Button -->
                <input type="submit" value="Submit" />
            </form>
        </div>

    </section>
</main>
@endsection

@section('script')
<script>
    CKEDITOR.replace('body')
  </script>
@endsection
