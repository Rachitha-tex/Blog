<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   
  {{--   @foreach ($titles as $name => $title)
    <ul>
        <li>{!!$name!!} - {{$title}}</li>
    </ul>
    @endforeach --}}
{{--     @foreach ($posts as $post)
       {{$post->username}}
       {{$post->name}}
       

    @endforeach --}}
   {{--  {{$users}} --}}
@foreach ($posts as $item)
    {{$item->name}}
    {{$item->title}}
    {!!$item->body!!}
@endforeach
{{ $posts->onEachSide(1)->links()  }}
</body>
</html>