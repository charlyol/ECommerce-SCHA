@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Catalog</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>
<body>
@section('Content')
<h1 class="text-3xl font-bold underline bg-red-500">
    Hello world!
</h1>
<div>Catalog</div>
<div class="grid grid-cols-3 gap-4">
    @foreach($catalog as $product)
        <div class="card w-96 bg-base-100 shadow-xl">
        <div class="card-body bg-gray-200 p-4">
            <h2 class="card-title">{{$product->title}}</h2>
            <p class="card-actions justify-end">{{$product->description}}</p>
            <p class="btn btn-primary">Prix : {{$product->price_wt}}€</p>
        </div>
        </div>
    @endforeach
</div>
{{ $catalog->links() }}
    @endsection
</body>
</html>
