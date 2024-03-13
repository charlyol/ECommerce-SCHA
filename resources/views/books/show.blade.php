@if (auth()->check())
    @php $layout= 'layouts.app' @endphp
@else
    @php $layout= 'layouts.guest' @endphp
@endif
@extends($layout)
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SCHA</title>
</head>
@section('Content')
<body>
    <div class=" mb-10 flex flex-col items-stretch mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <img src="{{$book->bannerByBook()[0]?? 'https://placehold.co/1440x500'}}"
                            alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                            class="h-full w-full object-cover object-center">
            <h1 class="text-3xl font-bold underline">{{ $book->title }}</h1>

            <a href="{{route('authorCatalog', ['firstName'=> $book->user()->first()->first_name, 'lastName'=> $book->user()->first()->last_name])}}"><h2  class="text-xl text-italic font-bold text-gray-900">
                {{$book->user()->first()->first_name}}-{{$book->user()->first()->last_name}}
            </h2></a>

            <div class="flex flex-row mt-6 gap-10">
                <div class="">
                        <img src="{{$book->coverByBook()[0]?? 'https://placehold.co/250x300'}}"
                            alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                            class="">
                </div>
                <div class="flex flex-col justify-between items-stretch">
                        <div>
                            <div>{{ $book->summary }}</div>
                        </div>

                        <form method="POST" action="{{ route('addToCartLong') }}" class="flex flex-col md:flex-row justify-between mx-20 flex items-center justify-between bg-red-700">

                            <div class="flex flex-row items-stretch border-solid border border-black bg-white">
                                <button onclick="var qty = this.parentNode.querySelector('.qty'); qty.value = qty.value <= 1 ? 1 : qty.value - 1;"
                                    class="px-2 rounded-r" type="button">
                                    <span>-</span>
                                </button>
                                <input type="text" name="quantity" value="1" max="{{ $book->stock }}" class="qty px-2 text-center w-12 border-0">
                                <button onclick="var qty = this.parentNode.querySelector('.qty'); qty.value = parseInt(qty.value) + 1;"
                                    class="px-2 rounded-r" type="button">
                                    <span>+</span>
                                </button>
                            </div>
                            <div class="font-bold text-3xl text-white mx-2">
                                {{ number_format($book->price_wt, 2, ',', ' ') }} €
                            </div>
                            <div class="flex flex-row items-center items-center">
                                <svg class="w-6 h-6 fill-white mr-2" viewBox="0 0 300.5 237">
                                    <path d="M118.3,184c-4,0-7-3-8-6l-65-161h-37c-11,0-11-17,0-17h42c4,0,7,2,8,6l9,22h217c9,0,18,7,16,16l-21,87
                                            c-3,9-8,17-17,17h-147l8,19h145c11,0,11,17,0,17L118.3,184L118.3,184z M141.3,190c13,0,23,11,23,23c0,13-10,24-23,24
                                            c-13,0-23-11-23-24C118.3,201,128.3,190,141.3,190z M239.3,190c13,0,24,11,24,23c0,13-11,24-24,24c-12,0-23-11-23-24
                                            C216.3,201,227.3,190,239.3,190z"></path>
                                </svg>
                                <button type="submit" class="focus:outline-none text-white hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium text-sm px-5 py-2.5 me-2dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    Ajouter au panier
                                </button>
                            </div>
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                        </form>


                </div>
            </div>
            <div class="my-20">{{ $book->description }}</div>
    </div>

    @if ($comments != null)
    <div class="flex flex-row justify-around flex-wrap" style="background-color: rgb(221, 221, 221)">
        
        @foreach ($comments as $comment)
            @include('comments.commentsBox')
        @endforeach
        
    </div>
    {{$comments->links()}}
    @endif

</body>
@endsection
</html>
