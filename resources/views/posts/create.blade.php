@extends('main')

@section('stylesheets')
	{!!Html::style('css/styles.css')!!}
	{!!Html::style('css/parsley.css')!!}
@endsection

@section('select')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

@endsection

@section('title', '| Create New Post')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Create New Post</h1>
		<hr>

		{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
		    {{ Form::label('title', 'Title')}}
		    {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}

		    {{ Form::label('slug', 'Slug') }}
		    {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}

		    {{ Form::label('category', 'Category') }}
		    <select name="category_id" class="form-control">
				@foreach($categories as $category)
				<option value='{{ $category->id }}'>{{ $category->name }}</option>
				@endforeach
			</select>

			{{ Form::label('tag', 'Tag') }}
			<select name="tags[]" class="form-control select2-multi" multiple ="multiple"">
				@foreach($tags as $tag)
				<option value="{{$tag->id}}">{{$tag->name}}</option>
				@endforeach
			</select>

			{{ Form::label('featured_image', 'Upload featured image:') }}
			{{ Form::file('featured_image', ['class' => 'form-control']) }}

		    {{ Form::label('body', 'Post Body',['class' => 'margin-top'])}}
		    {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => ''])}}

		    {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block margin-top'])}}
		{!! Form::close() !!}
		
	</div>
</div>

@endsection

@section('scripts')
	{!!Html::script('js/parsley.min.js')!!}

	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">$('select').select2();</script>

	<script>
		CKEDITOR.replace( 'body' );
	</script>

@endsection