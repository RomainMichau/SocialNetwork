@forelse($posts as $post)
    <div class="container">
        <div class="row">
                @if($post->type == 0)
                    <div class="publi">
                        <img src={{url("/img/photos/{$post->photo->id}.png")}} width=100%>
                        <div class="col-md-8" style="margin-top:10px;">
							<p><b>Kommentaires :</b></p>
							@forelse($post->comments as $comment)
								<p style="border-bottom: solid 1px #bbb;">{{ $comment->comment }}</p>
							@empty
								<p>Pas encore de kommentaire</p>
							@endforelse
						</div>
						<div class="col-md-4" style="margin-top:10px; border: solid 1px #bbb;">
							@forelse($post->likes as $like)
								<p><b>Kiffs :</b> {{ $like->like }} Kiff(s)</p>
							@empty
								<p style="float:right;"><b>Kiffs</b> : 0 Kiff</p>
							@endforelse
						</div>
					<p>&nbsp</p>
                    </div>
                @elseif($post->type == 1)
                    <div class="publi">
                        <video controls src={{url("/img/videos/{$post->video->id}.mp4")}} width=100%>Ici la description alternative</video>
						<div class="col-md-8" style="margin-top:10px;">
							<p><b>Kommentaires :</b></p>
							@forelse($post->comments as $comment)
								<p style="border-bottom: solid 1px #bbb;">{{ $comment->comment }}</p>
							@empty
								<p>Pas encore de kommentaire</p>
							@endforelse
						</div>
						<div class="col-md-4" style="margin-top:10px; border: solid 1px #bbb;">
							@forelse($post->likes as $like)
								<p><b>Kiffs :</b> {{ $like->like }} Kiff(s)</p>
							@empty
								<p><b>Kiffs :</b> 0 Kiff</p>
							@endforelse
						</div>
					<p>&nbsp</p>
                    </div>
                @elseif($post->type == 2)
                    <div class="publi">
                        <div class="container">
                            <div class="row">
                                <p>{{ $post->event->title }}</p>
                                <p>{{ $post->event->description }}</p>
                                <p>{{ $post->event->date }}</p>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
    </div>
@empty
    <p>No post</p>
@endforelse
