<div class="flex flex-row justify-around flex-wrap">
    @foreach ($books as $book)
        <div class="" style="background-color: white; box-shadow: 0 4px 8px rgb(184, 184, 184); padding: 20px; width: 300px; margin: 20px auto;">
            <div class="bg-white">
                <div class="">
                <div class="">
                    <a href="/books/{{$book->id}}" class="flex flex-col justify-evenly text-sm">
                    <div class="">
                        <img src="{{$book->coverByBook()[0]?? 'https://placehold.co/250x300'}}" alt="." class="h-full w-full object-cover object-center">
                    </div>
                    <div>
                        <h3 class="mt-4 font-medium text-gray-900">{{$book->title}}</h3>
                        <p class="italic text-gray-500">{{$book->description}}</p>
                    </div>
                    <div>
                        <p class="mt-2 font-medium text-gray-900">{{$book->price_wt}} € (HT)</p>
                    </div>
                    </a>
                </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{$books->links()}}