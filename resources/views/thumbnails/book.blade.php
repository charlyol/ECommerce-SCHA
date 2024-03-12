<div class="flex flex-col justify-between" style="background-color: white; box-shadow: 0 4px 8px rgb(184, 184, 184); padding: 20px; width: 300px; margin: 20px auto;">
    <a href="{{route('books.show',['id'=> $book->id])}}" class="text-sm">
        <div class="">
            <img src="{{$book->coverByBook()[0]?? 'https://placehold.co/250x300'}}" alt="." class="h-full w-full object-cover object-center">
        </div>
    </a>
    <a href="/books/{{$book->id}}" class="text-sm">
        <div>
            <h3 class="mt-4 font-medium text-gray-900">{{$book->title}}</h3>
            <p class="italic text-gray-500">{{$book->description}}</p>
        </div>
    </a>
        <div class="flex flex-row justify-between">
            <p class="mt-2 font-medium text-gray-900">{{$book->price_wt}} € (HT)</p>
            @if ($book->stock==0)
                <a href="#" class="inline-block px-4 py-1 bg-black text-white font-semibold rounded-lg hover:bg-black">
                    Indisponible
                </a>
            @else
                <a href="{{route('addToCart',['book'=> $book->id])}}" class="inline-block px-4 py-1 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600">
                    Ajouter au panier
                </a>
            @endif
        
        </div>
</div>
