@extends('layouts.guest')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
@section('Content')
<body>
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
