@forelse($post->comments as $comment)
    <div style="border-bottom: solid 1px #ddd;"> 
		<div class="row" style="margin: 10px 0 10px 0;">
			<div class="col-md-9">
				{{DB::table('users')->where('id',$comment->user_id)->get()[0]->name}}: {{ $comment->comment }}
			</div>
			<div class="col-md-3">
				@if(\Illuminate\Support\Facades\Auth::check())
					@if($comment->user_id==\Illuminate\Support\Facades\Auth::user()->id)
					{{ Form::open(['route' => ['admin.comments.destroy',$comment->id], 'method' => 'delete']) }}
					{{ Form::submit('supprimer', ['class' => 'btn btn-danger btn-xs']) }}
					{{ Form::close() }}
					@endif
				@endif
			</div>
		</div>
    </div>

@empty
    <div>Pas de kommentaire</div>
@endforelse