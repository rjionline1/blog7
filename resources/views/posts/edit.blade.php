@extends('main')

@section('stylesheets')
	{!!Html::style('css/styles.css')!!}
	<script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
@endsection

@section('select')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('title', '| Edit Blog Post')

@section('content')

	<div class="row">
	<img class="image" src="{{ asset('images/' . $post->image) }}" height="300" width="400">

	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

			{{ Form::label('slug', 'Slug', ['class' => 'margin-top']) }}
			{{ Form::text('slug', null, ['class' => 'form-control']) }}

			{{ Form::label('category', 'Category:', ['class' => 'margin-top']) }}
			{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

			{{ Form::label('tag', 'Tag:', ['class' => 'margin-top']) }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'select2-multi form-control', 'multiple' => 'multiple']) }}

			{{ Form::label('featured_image', 'Update featured image:', ['class' => 'margin-top']) }}
			{{ Form::file('featured_image', ['class' => 'form-control']) }}
			
			{{ Form::label('body', 'Body:', ['class' => 'margin-top']) }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}
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
						{!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class' => 'btn btn-danger btn-block']) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
						
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}

	</div>

@endsection

@section('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">$('select').select2();</script>
	<script>
		CKEDITOR.replace( 'body' );
	</script>

@endsection