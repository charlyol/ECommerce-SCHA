@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Catalog</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>
@section('Content')
<body>
@section('Content')
<h1 class="text-3xl font-bold underline bg-red-500">
    Hello world!
</h1>
<div>Catalog</div>
<div class="grid grid-cols-3 gap-4">
    @foreach($catalog as $book)
        @include('thumbnails.book')
    @endforeach
</div>
{{ $catalog->links() }}
    @endsection
</body>
@endsection
</html>
