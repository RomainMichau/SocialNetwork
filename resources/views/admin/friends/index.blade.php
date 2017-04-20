@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align:center">Mes Kamarades</h1>
                <div class="col-md-12">
                    @forelse($users as $user)
                        @if(Auth::user() != $user)
							<div class="util">
								<h2>
									<a href="{{ route('admin.users.show', $user->id) }}">{{ ucwords($user->name) }}</a>
									<small><span class="label label-info btn-md" style="float: right">{{ Auth::user()->getNameFriendship($user) }}</span></small>
								</h2>
								@if($user->profil)
									<img src={{url("/img/profils/{$user->id}.png")}} style="width:80px; margin: auto;">
								@else
									<p>no Picture</p>
								@endif
								<div style="margin-left: 500px;">
									@include('admin.users.status_bar')
								</div>
								<br>
							</div>
                        @endif
                    @empty
                        <p>No relations </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
