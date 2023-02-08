<div class="side-links">
    <ul>
      <li><a class="{{Request::routeIs('user.home') ? 'active' : ''}}" href="{{route('user.home')}}">Home</a></li>
      <li><a class="{{Request::routeIs('home.blog') ? 'active' : ''}}" href="{{route('home.blog')}}">Blog</a></li>
      <li><a class="{{Request::routeIs('about') ? 'active' : ''}}" href="{{route('about')}}">About</a></li>
      <li><a class="{{Request::routeIs('home.contact') ? 'active' : ''}}" href="{{route('home.contact')}}">Contact</a></li>
      
      
      @guest
      <li><a class="{{Request::routeIs('login') ? 'active' : ''}}" href="{{route('login')}}">Login</a></li>
      <li><a class="{{Request::routeIs('register') ? 'active' : ''}}" href="{{route('register')}}">Register</a></li>
      @endguest
      @auth
      <li><a class="{{Request::routeIs('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}">Dashboard</a></li>
      @endauth
    
    </ul>
  </div>