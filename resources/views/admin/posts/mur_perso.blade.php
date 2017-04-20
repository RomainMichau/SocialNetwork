@forelse($posts as $post)
    <div class="container">
        <div class="row">
            @if($post->voir==0)
                {{"Moi uniquement"}}@endif
            @if($post->voir==1)
                {{"Amis"}}@endif
            @if($post->voir==2)
                {{"Public"}}
            @endif

        @if($post->type == 0)
                <div class="publi">
					<div class="row">
                        <img src={{url("/img/photos/{$post->photo->id}.png")}} width=100%>
                        <div class="col-md-7" style="margin-top:10px;">
							<p><b>Kommentaires :</b></p>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="texte" name="comment" class="champ"/>
                                <button  type="submit" class="btn btn-primary btn-sm" name="avis">Submit</button>
                            </form>


                            @include('admin.mur.comments')

						</div>
						<div class="col-md-5" style="margin-top:10px; border: solid 1px #bbb;">
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
					</div>
				</div>

                @elseif($post->type == 1)
                    <div class="publi">
                        <div class="row">
							<video controls src={{url("/img/videos/{$post->video->id}.mp4")}} width=100%>Ici la description alternative</video>
							<div class="col-md-7" style="margin-top:10px;">
								<p><b>Kommentaires :</b></p>
								<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
									{{ csrf_field() }}
									<input type="texte" name="comment" class="champ"/>
									<button  type="submit" class="btn btn-primary btn-sm" name="avis">Submit</button>
								</form>
								@include('admin.mur.comments')
							</div>
							<div class="col-md-5" style="margin-top:10px; border: solid 1px #bbb;">
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
						</div>
					</div>

                @elseif($post->type == 2)
                    <div class="publi">
                        <div class="container">
                            <div class="row">
                                <p><b><u>{{ $post->event->title }}</u></b></p>
                                <p>{{ $post->event->description }}</p>
                                <p><i>{{ $post->event->date }}</i></p>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/mur',$post->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="texte" name="comment" class="champ"/>
                                    <button  type="submit" class="btn btn-primary btn-sm" name="avis">Submit</button>
                                </form>
                                @include('admin.mur.comments')
                            </div>
                        </div>
                    </div>
                @endif

        </div>
    </div>
@empty
    <p>No post</p>
@endforelse
