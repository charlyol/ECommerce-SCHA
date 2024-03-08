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

<form method="POST" action="{{ route('book.store') }}">
    @csrf
    <label>
        <input type="text" name="title" placeholder="Titre">
    </label>
    <br>
    <label>
        <textarea name="description" placeholder="Description"></textarea>
    </label>
<br>
    <button type="submit">Ajouter la BD</button>
</form>
</body>
</html>
