@extends('main')

@section('title', '| View Category')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3>Category: </h3>
		<p>{{ $category->name }}</p>
	</div>
</div>

@endsection