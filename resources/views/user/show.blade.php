@extends('layouts.app')
@section('content')
    @include('succes_message')
    <p>{{ $user->name }} </p>
    <p>{{ $user->email }}</p>
    <img src="/img/profils/{{$user->id}}.png" style="width:304px">
    <a href="/profil" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
@endsection