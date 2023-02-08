@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection
@section('main')
@include('sweetalert::alert')
<main class="container" style="background-color: #fff;">
    <section id="contact-us">
        <h1 style="padding-top: 50px;">Create New Post!</h1>
      
        <!-- Contact Form -->
        <div class="contact-form">
            <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Title -->
                <label for="title"><span>Title</span></label>
                <input type="text" id="title" name="title" value="{{old('title')}}" />
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
              <label for="categories"><span>Choose a category:</span></label>
              <select name="category_id" id="categories">
                  <option selected disabled>Select option </option>
                  @foreach ($category as $categories)
                      <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                  @endforeach
              </select>
              @error('category_id')
                  {{-- The $attributeValue field is/must be $validationRule --}}
                  <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
              @enderror

                <!-- Body-->
                <label for="body"><span>Body</span></label>
                <textarea id="body" name="body">{{old('body')}}</textarea>
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
