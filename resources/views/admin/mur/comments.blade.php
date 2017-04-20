@forelse($post->comments as $comment)
    <div> {{DB::table('users')->where('id',$comment->user_id)->get()[0]->name}}: {{ $comment->comment }}
        @if($comment->user_id==Auth::user()->id)
            {{ Form::open(['route' => ['admin.comments.destroy',$comment->id], 'method' => 'delete']) }}
            {{ Form::submit('supprimer', ['class' => 'btn btn-danger btn-xs']) }}
            {{ Form::close() }}
        @endif
    </div>

@empty
    <div>Pas de kommentaire</div>
@endforelse