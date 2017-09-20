@extends('main')

@section('stylesheets')
	{!!Html::style('css/styles.css')!!}
@endsection

@section('title', '| Edit Tag')

@section('content')

<div class="row">
	{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
	<div class="col-md-8 col-md-offset-2">
		{{ Form::label('name', 'Tag Name:') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}

		{{ Form::submit('Update Tag', ['class' => 'btn btn-success btn-block margin-top'])}}
	</div>
	{!! Form::close() !!}
</div>

@endsection