@if (auth()->check())
    @php $layout= 'layouts.app' @endphp
@else
    @php $layout= 'layouts.guest' @endphp
@endif
@extends($layout)
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Catalogue</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>
<body>
@section('Content')
    <div class="relative flex lg:inline-flex items-center px-3 py-2">
        <form method="GET" action="{{route('categories.find')}}">
            <input type="text" name="search" placeholder="Rechercher une BD ..." class="bg-trasparent  font-semibold text-sm text-gray-900 px-2 py-1 rounded-lg ">
            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">Rechercher</button>
        </form>
    </div>
<div class="text-center">
    <h1> Catalogue </h1></div>
<div class="grid grid-cols-3 gap-4">
    @foreach($catalog as $book)
        @include('thumbnails.book')
    @endforeach
</div>
{{ $catalog->links() }}
    @endsection
</body>
</html>
