@extends('layout')

@section('main')
@include('sweetalert::alert')
<main class="container" style="background-color: #fff;">
    <section id="contact-us">
        <h1 style="padding-top: 50px;">Edit Category!</h1>
      
        <!-- Contact Form -->
        <div class="contact-form">
            <form action="{{route('category.update',$category)}}" method="post" >
                @method('put')
                @csrf
                <!-- Title -->
                <label for="title"><span>Name</span></label>
                <input type="text" id="name" name="name" value="{{$category->name}}" />
                @error('name')
                <div style="color: red;">{{ $message }}</div>
                @enderror

                <!-- Button -->
                <input type="submit" value="Submit" />
            </form>
        </div>

    </section>
</main>
@endsection

