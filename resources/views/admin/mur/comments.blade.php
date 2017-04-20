<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="texte" name="comment"/>
    <button  type="submit" class="btn btn-primary btn-sm" name="avis">Submit</button>
</form>

@forelse($post->comments as $comment)
    <div> {{DB::table('users')->where('id',$comment->user_id)->get()[0]->name}}: {{ $comment->comment }} @if($comment->user_id==Auth::user()->id)
            {{ Form::open(['route' => ['admin.comments.destroy',$comment->id], 'method' => 'delete']) }}
            {{ Form::submit('supprimer', ['class' => 'btn btn-danger btn-xs']) }}
            {{ Form::close() }}
        @endif
    </div>

@empty
    <div>Pas de kommentaire</div>
@endforelse