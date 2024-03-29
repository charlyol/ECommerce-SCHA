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
    <div class="">
        <table>
            <caption>all our stuff</caption>
            <thead>
            <tr>
                <th scope="col">title</th>
                <th scope="col">summary</th>
                <th scope="col">description</th>
                <th scope="col">price</th>
                <th scope="col">stock</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
        @foreach($catalog as $book)
            @include('thumbnails.modif')
        @endforeach
            </tbody>
        </table>
    </div>
    {{ $catalog->links() }}
    @endsection
    </body>
</html>
