@extends('layouts.app')
@section('content')


    <script type="text/javascript">
        function like(i,j){
            //
        }
    </script>
    <div class="container vertical-center">
        <div class="row">
            <h1 style="text-align: center">Mon Kotidien</h1>
            @forelse($posts as $post)
                <div class="container" style="background-color: #c7ddef">
                    <div class="row">
                        <div>{{ $users[$post->user_id-1]->name }}</div>
                        @if($post->type == 0)
                            <img src={{url("/img/photos/{$post->photo->id}.png")}}>
                            <div style="background-color: #31b0d5">


                            </div>

                        @elseif($post->type == 1)
                            <video controls src={{url("/img/videos/{$post->video->id}.mp4")}}>Ici la description alternative</video>



                        @elseif($post->type == 2)
                            <div class="container">
                                <div class="row">
                                    <p>{{ $post->event->title }}</p>
                                    <p>{{ $post->event->description }}</p>
                                    <p>{{ $post->event->date }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>


				</form>
				
                <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                       @if(DB::table('likes')->select('like')->where([['post_id',$post->id],['user_id',Auth::user()->id]])->count()==0)

                            <button value="1" type="submit" class="btn btn-primary btn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','1']])->count()}}<i class="em em---1"></i></button>
                            <button value="2" type="submit" class="btn btn-primary btn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','2']])->count()}}<i class="em em--1"></i></button>
                            <button value="3" type="submit" class="btn btn-primary btn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','3']])->count()}}<i class="em em-clap"></i></button>
                            <button value="4" type="submit" class="btn btn-primary btn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','4']])->count()}}<i class="em em-cop"></i></button>
                            <button value="5" type="submit" class="btn btn-primary btn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','5']])->count()}}<i class="em em-cry "></i></button>
                            <button value="6" type="submit" class="btn btn-primary btn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','6']])->count()}}<i class="em em-grin "></i><i class="em em-gun "></i></button>
                        @endif
                        @if(DB::table('likes')->select('like')->where([['post_id',$post->id],['user_id',Auth::user()->id]])->count()!=0)

                            @if(DB::table('likes')->select('like')->where([['post_id',$post->id],['user_id',Auth::user()->id],['like','1']])->count()==1)

                                <div value="1"  class="nonbtn selnonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','1']])->count()}}<i class="em em---1"></i></div>
                            @else
                                <div value="1"  class="nonbtn nonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','1']])->count()}}<i class="em em---1"></i></div>
                            @endif
                            @if(DB::table('likes')->select('like')->where([['post_id',$post->id],['user_id',Auth::user()->id],['like','2']])->count()==1)

                                <div value="2"  class="nonbtn selnonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','2']])->count()}}<i class="em em--1"></i></div>
                            @else
                                <div value="2"  class="nonbtn nonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','2']])->count()}}<i class="em em--1"></i></div>
                            @endif
                            @if(DB::table('likes')->select('like')->where([['post_id',$post->id],['user_id',Auth::user()->id],['like','3']])->count()==1)
                                <div value="3"  class="nonbtn selnonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','3']])->count()}}<i class="em em-clap"></i></div>
                            @else
                                <div value="3"  class="nonbtn nonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','3']])->count()}}<i class="em em-clap"></i></div>
                            @endif
                            @if(DB::table('likes')->select('like')->where([['post_id',$post->id],['user_id',Auth::user()->id],['like','4']])->count()==1)
                                <div value="4"  class="nonbtn selnonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','4']])->count()}}<i class="em em-cop"></i></div>
                            @else
                                <div value="4"  class="nonbtn nonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','4']])->count()}}<i class="em em-cop"></i></div>
                            @endif
                            @if(DB::table('likes')->select('like')->where([['post_id',$post->id],['user_id',Auth::user()->id],['like','5']])->count()==1)
                                <div value="5"  class="nonbtn selnonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','5']])->count()}}<i class="em em-cry "></i></div>
                            @else
                                <div value="5"  class="nonbtn nonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','5']])->count()}}<i class="em em-cry "></i></div>
                            @endif
                            @if(DB::table('likes')->select('like')->where([['post_id',$post->id],['user_id',Auth::user()->id],['like','6']])->count()==1)
                                <div value="6"  class="nonbtn selnonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','6']])->count()}}<i class="em em-grin "></i><i class="em em-gun "></i></div>
                            @else
                                <div value="6"  class="nonbtn nonbtn-primary nonbtn-sm" name="avis">{{DB::table('likes')->select('like')->where([['post_id',$post->id],['like','6']])->count()}}<i class="em em-grin "></i><i class="em em-gun "></i></div>
                            @endif
                    @endif
                      </form>





                {{ Form::open(['route' => ['admin.likes.destroy',$post->id], 'method' => 'delete']) }}
                {{ Form::submit('reset', ['class' => 'btn btn-warning btn-xs']) }}
                {{ Form::close() }}


                <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="texte" name="comment"/>
                    <button  type="submit" class="btn btn-primary btn-sm" name="avis">Submit</button>
                </form>

                @forelse($post->comments as $comment)
                    <div> {{ $users[$comment->user_id-1]->name }}: {{ $comment->comment }}</div>

                @empty
                    <div>no comment</div>
                @endforelse






----------------------------------------------
@empty
<p>No Book</p>

@endforelse
</div>
</div>
@endsection