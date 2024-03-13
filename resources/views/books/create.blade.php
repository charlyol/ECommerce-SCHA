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
        <select class="form-control" id="user" name="user">

            <option value="" selected>Veuillez choisir le nom de l'auteur...</option>

            @foreach($authorsNames as $name)

                <option value="{{ $name }}">{{ $name }}</option>

            @endforeach

        </select>
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
        <select class="form-control" id="sagaId" name="sagaId" placeholder="Nom de la saga">

            <option value="" selected>Veuillez choisir la saga...</option>

            @foreach($allSagas as $saga)

                <option value="{{ $saga->id }}">{{ $saga->title }}</option>

            @endforeach

        </select>
    </label>
    <label>
        <select class="form-control" id="age_class_id" name="age_class_id" placeholder="Tranche d'age">

            <option value="" selected>Veuillez choisir la tranche d'âge...</option>

            @foreach($agesClasses as $ageClass)

                <option value="{{ $ageClass->id }}">{{ $ageClass->name }}</option>

            @endforeach

        </select>
    </label>
<br>
    <button type="submit">Ajouter la BD</button>
</form>
    @endsection
</body>
</html>
