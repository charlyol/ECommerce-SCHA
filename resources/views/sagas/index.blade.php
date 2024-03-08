<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>

   <h1> Titre de la saga: {{ $saga->title }}</h1>
    <div>{{ $saga->description }}</div>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl">
            <div class="relative overflow-hidden rounded-lg lg:h-96">
                <div class="absolute inset-0">
                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-01-featured-collection.jpg" alt="" class="hover:bg-gray-50 border-b-warning-content/50 object-cover object-center">
                </div>
                <div aria-hidden="true" class="relative h-96 w-full lg:hidden"></div>
                <div aria-hidden="true" class="relative h-32 w-full lg:hidden"></div>
                <div class="absolute inset-x-0 bottom-0 rounded-bl-lg rounded-br-lg bg-black bg-opacity-75 p-6 backdrop-blur backdrop-filter sm:flex sm:items-center sm:justify-between lg:inset-x-auto lg:inset-y-0 lg:w-96 lg:flex-col lg:items-start lg:rounded-br-none lg:rounded-tl-lg">
                    <div>
                        <h2 class="text-xl font-bold text-white">Workspace Collection</h2>
                        <p class="mt-1 text-sm text-gray-300">Upgrade your desk with objects that keep you organized and clear-minded.</p>
                    </div>
                    <a href="#" class="mt-6 flex flex-shrink-0 items-center justify-center rounded-md border border-white border-opacity-25 bg-white bg-opacity-0 px-4 py-3 text-base font-medium text-white hover:bg-opacity-10 sm:ml-8 sm:mt-0 lg:ml-0 lg:w-full">View the collection</a>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($books as $book)
    {{$book->title}}
    @endforeach
</body>
</html>
