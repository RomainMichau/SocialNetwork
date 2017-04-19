@extends('layouts.app')
@section('content')
    <div class="container vertical-center">
        <div class="row">
            <h1>My posts's list</h1>
            @forelse($posts as $post)
                <div class="container">
                    <div class="row">
                        <p>Name : {{ $users[$post->user_id-1]->name }}</p>
                        @if($post->type == 0)
                            <img src="/img/photos/{{$post->post_id}}.png">
                            <p>comment:</p>
                            @forelse($post->comments as $comment)
                                <p>{{ $comment->comment }}</p>
                                <p>{{ $users[$comment->user_id-1]->name }}</p>
                            @empty
                                <p>no comment</p>
                            @endforelse
                            <p>Like:</p>
                            @forelse($post->likes as $like)
                                <p>{{ $like->like }}</p>
                                <p>{{ $users[$like->user_id-1]->name }}</p>

                            @empty
                                <p>no like</p>
                            @endforelse
                        @elseif($post->type == 1)
                            <video controls src="/img/videos/{{$post->post_id}}.mp4">Ici la description alternative</video>
                            @forelse($post->comments as $comment)
                                <p>comment:</p>
                                <p>{{ $comment->comment }}</p>
                                <p>{{ $users[$comment->user_id-1]->name }}</p>

                            @empty
                                <p>no comment</p>
                            @endforelse
                            <p>Like:</p>
                            @forelse($post->likes as $like)
                                <p>{{ $like->like }}</p>
                                <p>{{ $users[$like->user_id-1]->name }}</p>

                            @empty
                                <p>no like</p>
                            @endforelse
                        @elseif($post->type == 2)
                            <p>evenement (pas fait)</p>
                        @endif
                    </div>
                </div>
            @empty
                <p>No Book</p>
            @endforelse
        </div>
    </div>
@endsection