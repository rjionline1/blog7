@extends('main')

@section('stylesheets')
	{!!Html::style('css/styles.css')!!}
@endsection

@section('title', '| Edit Blog Post')

@section('content')

	<div class="row">

	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

			{{ Form::label('slug', 'Slug', ['class' => 'margin-top']) }}
			{{ Form::text('slug', null, ['class' => 'form-control']) }}
			
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