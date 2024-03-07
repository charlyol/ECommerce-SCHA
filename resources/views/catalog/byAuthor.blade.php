<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <div>

        <?php foreach ($comments as $comment) : ?>
        <blockquote>
            {{$comment->body}}
            <footer>
                - {{$comment->user()->first()->first_name}} {{$comment->user()->first()->last_name}} 
                - {{$comment->updated_at}},
                <cite>
                    {{$comment->book()->first()->title}}
                </cite>
            </footer>
        </blockquote>
        <?php endforeach;?>
        {{$comments->links() }}
    </div> 
</body>
</html>