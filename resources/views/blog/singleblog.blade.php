@extends('layout')

@section('main')
     <!-- main -->
     <main class="container">
      <section class="single-blog-post">
        <h1>{{$posts->title}}</h1>

        <p class="time-and-author">
          {{$posts->created_at->diffForHumans()}}
          <span>Written By {{$posts->user->name}}</span>
        </p>

        <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img src="{{asset($posts->imagePath)}}" alt="" />
        </div>

        <div class="about-text">
          <p>
            {!! $posts->body !!}
          </p>
        </div>
      </section>
      <section class="recommended">
        <p>Related</p>
        <div class="recommended-cards">
          @foreach ($relatedPost as $item)
          <a href="">
            <div class="recommended-card">
              <img src="{{asset($item->imagePath)}}" alt="" loading="lazy" />
              <h4>
               {{$item->title}}
              </h4>
            </div>
          </a>
          @endforeach
    

        </div>
      </section>
    </main>
@endsection