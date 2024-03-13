<tr>
    <td>
        <a href="/books/{{$book->id}}" class="text-sm">
            {{$book->title}}
        </a>
    </td>
    <td>
        {{$book->summary}}
    </td>
    <td>
        {{$book->description}}
    </td>
    <td>
        {{$book->price_wt}} €
    </td>
    <td>
        {{$book->stock}} U
    </td>
    <td>
        <a href="{{ route('books.edit', $book->id) }}" type="button"
           class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Modify
        </a>

        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 border border-blue-700 rounded">Delete</button>
        </form>
    </td>
</tr>
