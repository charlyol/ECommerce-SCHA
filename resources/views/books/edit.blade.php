<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $book->title}}">

    <label for="summary">Summary:</label>
    <input type="text" id="summary" name="summary" value="{{ $book->summary}}">

    <label for="price_wt">Price:</label>
    <input type="number" id="price_wt" name="price_wt" value="{{ $book->price_wt }}">

    <button type="submit">Sauvegarder</button>
</form>
