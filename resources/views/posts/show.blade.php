<x-layout>

    <h1>{{$post->title}}</h1>

    <p>{{$post->body}}</p>

    <p>Autore: {{$author->name}}</p>

    <h2>Commenti</h2>

    @if ($comments_response == true)
    
        @foreach ($comments as $comment)
        
            <h3>Autore: {{$comment->name}}</h3>

            <p>Email: {{$comment->email}}</p>

            <p>{{$comment->body}}</p>

        @endforeach

    @else

        <p>Non ci sono commenti</p>

    @endif

    <a href="{{route('posts.index')}}">Torna a tutti gli articoli</a>

</x-layout>