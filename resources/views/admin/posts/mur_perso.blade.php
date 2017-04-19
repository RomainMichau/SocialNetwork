@forelse($posts as $post)
    <div class="container">
        <div class="row">
                @if($post->type == 0)
                    <div class="publi">
                        <img src={{url("/img/photos/{$post->post_id}.png")}} width=100%>
                        <p>Kommentaires :</p>
                        @forelse($post->comments as $comment)
                            <p>{{ $comment->comment }}</p>
                        @empty
                            <p>Pas encore de kommentaire</p>
                        @endforelse
                        <p>Kiffs :</p>
                        @forelse($post->likes as $like)
                            <p>{{ $like->like }} Kiff(s)</p>

                        @empty
                            <p>0 Kiff</p>
                        @endforelse
                    </div>
                @elseif($post->type == 1)
                    <div class="publi">
                        <video controls src={{url("/img/videos/{$post->post_id}.mp4")}} width=100%>Ici la description alternative</video>
                        @forelse($post->comments as $comment)
                            <p>Kommentaires :>
                            <p>{{ $comment->comment }}</p>

                        @empty
                            <p>Pas encore de kommentaire</p>
                        @endforelse
                        <p>Kiff :</p>
                        @forelse($post->likes as $like)
                            <p>{{ $like->like }} Kiff(s)</p>

                        @empty
                            <p>0 Kiff</p>
                        @endforelse
                    </div>
                @elseif($post->type == 2)
                    <div class="publi">
                        <p>Evenement (pas encore fait)</p>
                    </div>
                @endif
        </div>
    </div>
@empty
    <p>No post</p>
@endforelse
