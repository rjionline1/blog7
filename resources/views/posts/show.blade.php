@extends('main')

@section('stylesheets')
	{!!Html::style('css/styles.css')!!}
@endsection

@section('title', '| View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{{ $post->body }}</p>
		</div>

		<div class="col-md-4 margin-top">
			<div class="well">
				<dl>
					<dt>Created At: </dt>
					<dd>{{ date('M j, Y h:i a',strtotime($post->created_at)) }}</dd>
					<dt>Updated At: </dt>
					<dd>{{ date('M j, Y h:i a',strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block']) !!}
					</div>
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.destroy', 'Delete', [$post->id], ['class' => 'btn btn-danger btn-block']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	

@endsection