@extends('layout')
@section('main')
        <!-- main -->
        <main class="container">
          <h2 class="header-title">All Blog Posts</h2>
          @if (session('status'))
              <p style="color:#fff;width:100%;font-size:18px;padding:10px;text-align:center;background:#5cbB5c">{{session('status')}}</p>
          @endif
          <div class="searchbar">
            <form action="">
              <input type="text" placeholder="Search..." name="search" />
    
              <button type="submit">
                <i class="fa fa-search"></i>
              </button>
    
            </form>
          </div>
          <div class="categories">
            <ul>
              @foreach ($categories as $category)
              <li><a href="{{route('home.blog',['category'=>$category->name])}}">{{$category->name}}</a></li>
                  
              @endforeach
            </ul>
          </div>
          <section class="cards-blog latest-blog">
            @forelse ($posts as $post)
  
            <div class="card-blog-content">
              @auth
              @if (auth()->user()->id === $post->user->id)
              <div class="post-buttons">
                <a href="{{route('blog.edit',$post)}}">Edit</a>
                <form action="{{route('blog.delete',$post)}}" method="post">
                  @csrf
                  @method('delete')
                
                  <input type="submit" value="delete">
                </form>
              
            </div>
              @endif
           
              @endauth
           
              <img src="{{asset($post->imagePath)}}" alt="" />
              <p>
                {{$post->created_at->diffForHumans()}}
                <span>Written By {{$post->user->name}}</span>
              </p>
              <h4>
                <a href="{{route('blog.show',$post)}}">
                {{$post->title}}</a>
              </h4>
            </div>
            @empty
            <p>Sorry, currently there is no post</p>
            @endforelse
         
    
          
    

          </section>
                      <!-- pagination -->
                {{$posts->links('pagination::default')}}
                      <br>
    
          <!-- Main footer -->
          <footer class="main-footer">
            <div>
              <a href=""><i class="fab fa-facebook-f"></i></a>
              <a href=""><i class="fab fa-instagram"></i></a>
              <a href=""><i class="fab fa-twitter"></i></a>
            </div>
            <small>&copy 2021 Alphayo Blog</small>
          </footer>
        </main>

@endsection

