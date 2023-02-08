@extends('layout')

@section('main')
@include('sweetalert::alert')
<main class="container" style="background-color: #fff;">
    <section id="contact-us">
        <h1 style="padding-top: 50px;">Create New Category!</h1>
      
        <!-- Contact Form -->
        <div class="contact-form">
            <form action="{{route('category.store')}}" method="post" >
                @csrf
                <!-- Title -->
                <label for="title"><span>Name</span></label>
                <input type="text" id="name" name="name" value="{{old('name')}}" />
                @error('name')
                <div style="color: red;">{{ $message }}</div>
                @enderror

                <!-- Button -->
                <input type="submit" value="Submit" />
            </form>
        </div>
<div class="create-categories">
    <a href="{{route('category.index')}}">Categories List <span>&#8594;</span></a>
</div>
    </section>
</main>
@endsection

