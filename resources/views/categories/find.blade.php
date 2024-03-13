@extends('layouts.app')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Résultat de votre recherche</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>
<body>
@section('Content')
{{--    @if($booksByCategory->isEmpty())--}}
{{--        <p>Aucune catégorie trouvée.</p>--}}
{{--    @else--}}
{{--        <ul>--}}
{{--            @foreach($booksByCategory as $bookByCategory)--}}
{{--                <li>--}}
{{--                    <strong>{{ $bookByCategory->title }}</strong>--}}
{{--                    <ul>--}}

{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}

{{--    @endif--}}
@if(isset($booksByCategory) && !$booksByCategory->isEmpty())
    <ul>
        @foreach($booksByCategory as $bookByCategory)
            <li>
                <strong>{{ $bookByCategory->title }}</strong>
            </li>
        @endforeach
    </ul>
@else
    <p>Aucune catégorie trouvée.</p>
@endif
@endsection
</body>
</html>

