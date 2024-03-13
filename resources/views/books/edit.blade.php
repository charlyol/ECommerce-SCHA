

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $book->title }}">
    <label for="title">Summary:</label>
    <input type="text" id="Summary" name="Summary" value="{{ $book->Summary }}">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $book->title }}">
    <button type="submit">Sauvegarder</button>
</form>
