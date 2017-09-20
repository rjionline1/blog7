@extends('main')

@section('title', '| All Posts')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Blog Posts</h1>
		<hr>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		@foreach ($posts as $post)

			<h2>{{ $post->title }}</h2>
			<h5>Published Date: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
			<p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen($post->body) > 50 ? " ..." : ""}}</p>

			<a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">Read More</a>
			<hr>
			<br>

		@endforeach
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{!! $posts->links() !!}
		</div>
	</div>
</div>

@endsection