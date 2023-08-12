<x-layout>

    <h1>Tutti i post</h1>

    @foreach ($posts as $post)

        <h2><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></h2>
        
    @endforeach

</x-layout>