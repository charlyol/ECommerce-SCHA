<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $book->title}}" required>

    <label for="summary">Summary:</label>
    <input type="text" id="summary" name="summary" value="{{ $book->summary}}" required>

    <label for="description">Déscription:</label>
    <input type="text" id="description" name="description" value="{{ $book->description}}" required>

    <label for="price_wt">Price:</label>
    <input type="number" id="price_wt" name="price_wt" value="{{ $book->price_wt }}" required>

    <label for="stock">Stock:</label>
    <input type="stock" id="stock" name="stock" value="{{ $book->stock }}" required>

    <button type="submit">Sauvegarder</button>
</form>
