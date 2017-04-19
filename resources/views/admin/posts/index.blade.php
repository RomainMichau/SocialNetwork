@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		{{dd($users)}}
			@include('admin.posts.mur_perso')
		</div>
	</div>
</div>
@endsection
