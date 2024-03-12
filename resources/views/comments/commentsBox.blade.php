
    <blockquote  class="mt-1 italic flex flex-col justify-between"
    style="border-radius:10%; background-color: rgb(255, 255, 255); box-shadow: 0 4px 8px rgba(255, 0, 0, 0.342);
    padding: 20px; width: 300px; margin: 20px auto;">
        "{{$comment->body}}"
        <footer class="mt-1 italic text-gray-500">
            @if( $comment->user->role->name =='author')
            <a href="/{{$comment->user->first_name}}-{{$comment->user->last_name}}" >
                - {{$comment->user->first_name}} {{$comment->user->last_name}}
            </a>
            @else
            - {{$comment->user->first_name}} {{$comment->user->last_name}}
            @endif
            - {{$comment->updated_at->format('d/m/Y')}},
            <cite >
                {{$comment->book->title}}
            </cite>
        </footer>
        {{$comment->user->role()->first()->name}}
    </blockquote>
