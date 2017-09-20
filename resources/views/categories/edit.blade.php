@extends('main')

@section('stylesheets')
	{!!Html::style('css/styles.css')!!}
@endsection

@section('title', '| Edit Category')

@section('content')

<div class="row">
	{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
	<div class="col-md-8 col-md-offset-2">
		{{ Form::label('name', 'Category Name:') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}

		{{ Form::submit('Update Category', ['class' => 'btn btn-success btn-block margin-top'])}}
	</div>
	{!! Form::close() !!}
</div>

@endsection