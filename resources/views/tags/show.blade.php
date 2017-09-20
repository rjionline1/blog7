@extends('main')

@section('stylesheets')
	{!!Html::style('css/styles.css')!!}
@endsection

@section('title', '| View Tag')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h3>Tag: {{ $tag->name }} </h3>
		<small><i> {{ $tag->posts()->count() }} {{ $tag->posts()->count() !== 1 ? "Posts" : "Post" }} </i></small>
	</div>
	<div class="col-md-2 md-col-offset-2">
		<a href="{{ route('tags.edit', $tag->id) }}" class='btn btn-primary btn-block pull-right margin-top'>Edit</a>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Tags</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($tag->posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>@foreach ($post->tags as $tags)
						<span class="label label-default">{{ $tags->name }}</span>
						@endforeach
					</td>
					<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View Post</a></td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>

@endsection

