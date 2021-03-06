@extends('layouts.app')
@section('content')
    <div class="container vertical-center">
        <div class="row">
            <h1 style="text-align: center">Mon Kotidien</h1>
            @forelse($posts as $post)
                <div class="container" style="padding: 0;">
                    <div class="row">

                        <!-- ***********************************************************************************************************
                        ****************************************************************************************************************
                        -->
                        @if($post->type == 0)
                            <div class="publi2">
                                <a href="{{ route('admin.users.show', $post->user_id) }}"><h3><b>{{DB::table('users')->where('id',$post->user_id)->get()[0]->name }}</b></h3></a>
                                <img src={{url("/img/photos/{$post->photo->id}.png")}}>
                                </br><br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="texte" name="comment" class="champ"/>
                                            <button  type="submit" class="btn btn-primary btn-sm" name="avis">Submit</button>
                                        </form>
                                    </div>
                                    <div class="col-md-5">
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
                                    </div>
                                    @include('admin.mur.comments')
                                </div>

                                <!-- ***********************************************************************************************************
                                ****************************************************************************************************************
                                -->
                                @elseif($post->type == 1)
                                    <div class="publi2">
                                        <a href="{{ route('admin.users.show', $post->user_id) }}"><h3><b>{{DB::table('users')->where('id',$post->user_id)->get()[0]->name}}</b></h3></a>
                                        <video controls src={{url("/img/videos/{$post->video->id}.mp4")}}>Ici la description alternative</video>
                                        </br><br>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <input type="texte" name="comment" class="champ"/>
                                                    <button  type="submit" class="btn btn-primary btn-sm" name="avis">Submit</button>
                                                </form>
                                            </div>
                                            <div class="col-md-5">
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
                                            </div>
                                            @include('admin.mur.comments')
                                        </div>

                                        <!-- ***********************************************************************************************************
                                        ****************************************************************************************************************
                                        -->

                                        @elseif($post->type == 2)
                                            <div class="publi2">
                                                <a href="{{ route('admin.users.show', $post->user_id) }}"><h3><b>{{DB::table('users')->where('id',$post->user_id)->get()[0]->name}}</b></h3></a>
                                                <p><b><u>{{ $post->event->title }}</u></b></p>
                                                <p>{{ $post->event->description }}</p>
                                                <p><i>{{ $post->event->date }}</i></p>
                                                </br>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <input type="texte" name="comment" class="champ"/>
                                                            <button  type="submit" class="btn btn-primary btn-sm" name="avis">Submit</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-5">
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
                                                    </div>
                                                    @include('admin.mur.comments')
                                                </div>
                                                @endif
                                            </div>

                                    </div>



                                    </form>


                                    @empty
                                        <p>Kotidien vide</p>


                                    @endforelse
                            </div>
                    </div>

@endsection