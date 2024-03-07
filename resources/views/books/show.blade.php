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
<body>


    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
       <div class="justify center">
            <h2 class=" text-2xl font-bold text-gray-900">Fiche produit</h2>

            <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                <div class="group relative">
                    <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
                    </div>
                    <h3 class="mt-6 text-sm text-black-500">
                        <a href="#">
                            <span class="absolute inset-0"></span>
                            <h1 class="text-3xl font-bold underline">{{ $book->title }}</h1> <br>
                            <p>Description: {{ $book->description }}</p> <br>
                            <p>Résumé: {{ $book->summary }}</p>
                        </a>
                    </h3>
                    <h1 class="text-base font-semibold text-gray-900">Prix: {{ $book->price_wt }} €</h1>
                </div>
            </div>

            <button type="submit" class="mt-10 flex  items-center justify-center rounded-md border border-transparent bg-red-600 px-8 py-3 text-base font-medium text-white hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Ajouter au panier</button>

        </div>

    </div>


</body>
</html>
