@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align:center; margin:50px 0 50px 0;">Mes Publications</h1>
			@include('admin.posts.mur_perso')
		</div>
	</div>
</div>
@endsection
