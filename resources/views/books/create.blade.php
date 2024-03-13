@extends('layouts.app')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création d'une BD</title>

</head>
<body>
@section('Content')
<form method="POST" action="{{ route('book.store') }}">
    @csrf

    <label>
        <input type="text" name="title" placeholder="Titre">
    </label>
    <label>
        <input type="text" name="author" placeholder="Auteur">
        </label>
    <br>
    <label>
        <textarea name="description" placeholder="Description"></textarea>
    </label>
    <label>
        <textarea name="summary" placeholder="Résumé"></textarea>
    </label>
    <label>
        <input type="number" name="size" placeholder="Dimensions">
    </label>
    <label>
        <input type="number" name="page_quantity" placeholder="Nombre de page">
    </label>
    <label>
        <input type="number" name="price_wt" placeholder="Prix HT du livre">
    </label>
    <label>
        <input type="number" name="weight" placeholder="Poids du livre">
    </label>
    <label>
        <input type="number" name="stock" placeholder="Inventaire du livre">
    </label>
    <label>
        <textarea name="saga_id" placeholder="Id de la saga"></textarea>
    </label>
    <label>
        <textarea name="age_class_id" placeholder="tranche d'âge"></textarea>
    </label>
<br>
    <button type="submit">Ajouter la BD</button>
</form>
    @endsection
</body>
</html>
