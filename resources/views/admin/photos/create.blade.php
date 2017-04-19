@extends('layouts.app')
@section('content')
    <div class="container vertical-center">
        <div class="row">
            <h1>My book's list</h1>
            @forelse($posts as $post)
                <div class="container">
                    <div class="row">
                        @if($post->type == 0)
                            <img src="/img/photos/{{$post->post_id}}.png">
                            @forelse($post->comments as $comment)
                                <p>{{ $comment->comment }}</p>
                                <p>{{ $comment->user->name }}</p>
                            @empty
                                <p>no comment</p>
                            @endforelse
                            @forelse($post->likes as $like)
                                <p>{{ $like->like }}</p>
                            @empty
                                <p>no like</p>
                            @endforelse
                        @elseif($post->type == 1)
                            <video controls src="/img/videos/{{$post->post_id}}.mp4">Ici la description alternative</video>
                            @forelse($post->comments as $comment)
                                <p>{{ $comment->comment }}</p>
                                <p>{{ $comment->user->name }}</p>
                            @empty
                                <p>no comment</p>
                            @endforelse
                            @forelse($post->likes as $like)
                                <p>{{ $like->like }}</p>
                            @empty
                                <p>no like</p>
                            @endforelse
                        @endif
                    </div>
                </div>
            @empty
                <p>No Book</p>
            @endforelse
        </div>
    </div>
@endsection