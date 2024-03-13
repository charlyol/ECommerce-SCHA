
<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $book->title }}">
        </div>
        <div>
            <label for="summary">Summary:</label>
            <textarea id="summary" name="summary">{{ $book->summary }}</textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="{{ $book->price_wt }}">
        </div>
        <button type="submit">Update Book</button>
    </form>
@endsection
