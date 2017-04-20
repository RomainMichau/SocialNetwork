@extends('layouts.app')
@section('content')



    <div class="container">
        <div class="row">
        @forelse($posts as $post)
                <div class="publi">
                    <div class="container">
                        <div class="row">
                            <p>{{ $post->event->title }}</p>
                            <p>{{ $post->event->description }}</p>
                            <p>{{ $post->event->date }}</p>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="texte" name="comment" class="champ"/>
                                <button  type="submit" class="btn btn-primary btn-sm" name="avis">Submit</button>
                            </form>
                            @include('admin.mur.comments')
                        </div>
                    </div>
                </div>



                ---------------------------------------------
        @empty
            No Event
        @endforelse
        </div>
    </div>
@endsection