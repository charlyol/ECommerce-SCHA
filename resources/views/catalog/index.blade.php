@extends('layouts.navigation')
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
@if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
            <a href="{{ url('/dashboard') }}"
               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
        @else
            <a href="{{ route('login') }}"
               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    </div>
@endif
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
</body>
</html>
