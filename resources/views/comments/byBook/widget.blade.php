
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
</div>
