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
					<dt>URL:</dt>
					<dd> <a href= "{{url('blog/' . $post->slug)}}">{{url('blog/' . $post->slug)}}</a></dd>
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
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'onsubmit' => "return confirm('Are you sure you want to delete?')"]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						{!! Html::linkRoute('posts.index', '<< Show All Posts', [], ['class' => 'btn btn-default btn-block margin-top']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	

@endsection