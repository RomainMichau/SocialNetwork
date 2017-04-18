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
                    @elseif($post->type == 1)
                        <video controls src="/img/videos/{{$post->post_id}}.mp4">Ici la description alternative</video>
                    @endif
                    </div>
                </div>
            @empty
                <p>No Book</p>
            @endforelse
        </div>
    </div>
@endsection