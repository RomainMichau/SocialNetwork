@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Users</h1>
                <div class="col-md-12">
                    @foreach($users as $user)
                        <h2>
                            <a href="{{ route('users.show', $user->id) }}">{{ ucwords($user->name) }}</a>
                        </h2>
                        @if($user->profil)
                            <img src="/img/profils/{{$user->id}}.png" style="width:80px">
                        @else
                            <p>no Picture</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection