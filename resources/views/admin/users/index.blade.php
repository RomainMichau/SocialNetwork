@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center">Klients</h1>
                <div class="col-md-12">					
                    @foreach($users as $user)
                        @if(Auth::user() != $user)
                            <div class="util">
								<h2>
									<a href="{{ route('admin.users.show', $user->id) }}" class="text-capitalize">{{ $user->name }}</a>
									<small><span class="label label-info btn-md" style="float: right">{{ Auth::user()->getNameFriendship($user) }}</span></small>
								</h2>
								@if($user->profil)
									<img src={{url("/img/profils/{$user->id}.png")}} style="width:80px; margin: auto;">
									<br><br>
								@else
									<p>Pas de Kliché</p>
								@endif
								<div style="margin-left: 500px;">
									@include('admin.users.status_bar')
								</div>
								@if(\Illuminate\Support\Facades\Auth::user()->type == 1 && $user->type != 1)
									{{ Form::open(['route' => ['admin.users.destroy',$user->id], 'method' => 'delete']) }}
									{{ Form::submit('supprimer', ['class' => 'btn btn-danger btn-xs']) }}
									{{ Form::close() }}
								@endif
								<br>
							</div>
                        @endif					
                    @endforeach
					
                </div>
            </div>
        </div>
    </div>
@endsection