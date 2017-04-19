@extends('layouts.app')
@section('content')
    @include('succes_message')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img class="img-responsive" src={{url("/img/couverture/{$user->id}.png")}} width="100%" height="345"> 
			</div>
		</div>
		
		<div class="absolute" class="row">
			<div class="col-md-4">
				<img class="profil" src={{url("/img/profils/{$user->id}.png")}} >
			</div>
			<div class="col-md-5">
				<p class="centrer" style="font-size: 20px">{{ $user->name }} </p>
			</div>
			<div class="col-md-3">
				<div class="centrer2"><a href={{url('/profil')}} class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a></div>
			</div>
		</div>
		
		<div class="row">
			<br><br>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4" style="padding-left: 100px">
						<a href={{url('/admin/photos/create')}} class="btn btn-primary btn-lg active"  role="button" aria-pressed="true">Upload une Photo</a>
					</div>
					<div class="col-md-4" style="padding-left: 100px">
						<a href={{url('/admin/videos/create')}} class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Upload une Vidéo</a>
					</div>
					<div class="col-md-4" style="padding-left: 100px">
						<a href={{url('/admin/events/create')}} class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Partager un évènement</a>
					</div>
				</div>
				@include('admin.posts.mur_perso')
			</div>
		</div>
	</div>
@endsection