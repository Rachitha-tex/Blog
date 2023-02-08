@extends('layout')

@section('main')
    <div class="categories-list">
        <h1>Categories List</h1>
           @foreach ($catgeory as $item)
           <div class="item">
            <p>{{$item->name}}</p>
            <div>
                <a href="{{route('category.edit',$item)}}">Edit</a>
            </div>
            <form action="{{route('category.destroy',$item)}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" value="Delete">
            </form>
        </div>
           @endforeach
          
        <div class="index-categories">
            <a href="{{ route('category.create') }}">Create category<span>&#8594;</span></a>
        </div>
    </div>
@endsection