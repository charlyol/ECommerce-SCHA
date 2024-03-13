@if (auth()->check())
    @php $layout= 'layouts.app' @endphp
@else
    @php $layout= 'layouts.guest' @endphp
@endif
@extends($layout)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    @section ('Content')
    <h1 class="text-3xl font-bold underline">{{$user->first_name}} - {{$user->last_name}} - {{$user->nickname}}</h1>
    <p>{{$user->bio}} </p>
    <h2>Les ouvrages de {{$user->first_name}} - {{$user->last_name}}</h2>
    <div class="flex flex-row justify-around flex-wrap">
        @foreach ($books as $book)
            @include('thumbnails.book')
        @endforeach
        </div>
        {{$books->links()}}
    <h2>Les avis des lecteurs</h2>
    <div class="flex flex-row justify-around flex-wrap" style="background-color: rgb(221, 221, 221)">
    @foreach ($comments as $comment)
        @include('comments.commentsBox')
    @endforeach
</div>
{{$comments->links()}}
@endsection
</body>
</html>