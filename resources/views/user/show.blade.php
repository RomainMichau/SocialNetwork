@extends('layouts.app')
@section('content')
    <p>{{ $user->name }} </p>
    <p>{{ $user->email }}</p>
    <img src="/img/pictures/{{$user->id}}.png" style="width:304px">
    <a href="/profil" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
@endsection