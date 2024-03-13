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
        <div class="flex flex-row justify-between items-center">
            <p class="mt-2 font-medium text-gray-900">{{$book->price_wt}} € (HT)</p>
            @if ($book->stock==0)
                <a href="#" class="flex flex-row justify-between items-centerinline-block px-2 py-1bg-black text-white font-semibold rounded-lg hover:bg-black">
                      <svg class="h-5 w-5 flex-shrink-0 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                    </svg>
                    Indisponible
                </a>
            @else
                <a href="{{route('addToCart',['book'=> $book->id])}}" class="flex flex-row justify-between items-centerinline-block px-2 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                    <svg class="w-5 h-5 mr-2 fill-white" viewBox="0 0 300.5 237">
                        <path d="M104.3,184c-4,0-7-3-8-6l-65-161h-37c-11,0-11-17,0-17h42c4,0,7,2,8,6l9,22h217c9,0,18,7,16,16l-21,87
                                c-3,9-8,17-17,17h-147l8,19h145c11,0,11,17,0,17L104.3,184L104.3,184z M127.3,190c13,0,23,11,23,23c0,13-10,24-23,24
                                c-13,0-23-11-23-24C104.3,201,114.3,190,127.3,190z M225.3,190c13,0,24,11,24,23c0,13-11,24-24,24c-12,0-23-11-23-24
                                C202.3,201,213.3,190,225.3,190z"></path>
                    </svg>
                    
                    Ajouter au panier
                </a>
            @endif

        </div>
</div>
