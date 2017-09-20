@extends('main')

@section('stylesheets')
	{!!Html::style('css/styles.css')!!}
@endsection

@section('title', '| Edit Comment')

@section('content')

	<h1>Edit Comment</h1>

	{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'disabled']) }}

		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', null, ['class' => 'form-control', 'disabled']) }}

		{{ Form::label('comment', 'Comment') }}
		{{ Form::textarea('comment', null, ['class' => 'form-control']) }}

		{{ Form::submit('Update Comment', ['class' => 'btn btn-primary btn-block margin-top']) }}

	{{ Form::close() }}	

@endsection