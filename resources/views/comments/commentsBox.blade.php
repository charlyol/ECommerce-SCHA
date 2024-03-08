<div class="flex flex-row justify-around flex-wrap" style="background-color: rgb(221, 221, 221)">
    @foreach ($comments as $comment)
    <blockquote  class="mt-1 italic flex flex-col justify-between"
    style="border-radius:10%; background-color: rgb(255, 255, 255); box-shadow: 0 4px 8px rgba(255, 0, 0, 0.342);
    padding: 20px; width: 300px; margin: 20px auto;">
        "{{$comment->body}}"
        <footer class="mt-1 italic text-gray-500">
            - {{$comment->user()->first()->first_name}} {{$comment->user()->first()->last_name}} 
            - {{$comment->updated_at->format('d/m/Y')}},
            <cite >
                {{$comment->book()->first()->title}}
            </cite>
            
        </footer>
        {{$comment->user()->first()->role()->first()->name}}
    </blockquote>
    @endforeach
</div>
{{$comments->links()}}