@extends('main')

@section('stylesheets')
  {!!Html::style('css/styles.css')!!}
@endsection

@section('title', '| All Tags')

@section('content')

<div class="row">
	<div class="col-md-8">

	<h1>Tags</h1>

		<table class="table">
		<thead>
			<tr>
				<th>id#</th>
				<th>Name</th>
				<th width=5%></th>
				<th width=5%></th>
				<th width=5%></th>
			</tr>
		</thead>
		<tbody>
			@foreach($tags as $tag)
			<tr>
				<th>{{ $tag->id }}</th>
				<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
				<td><a href="{{ route('tags.show', $tag->id) }}" class='btn btn-default btn-sm' >View</a>

				<td><a href="{{ route('tags.edit', $tag->id) }}" class='btn btn-default btn-sm' >Edit</a></td>
				
				<td>{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete', 'onsubmit' => "return confirm('Are you sure you want to delete?')"]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
						{!! Form::close() !!}</td>
			</tr>
			@endforeach
		</tbody>
		
		</table>
	</div>

	<div class="col-md-3 col-md-offset-1">
		<div class="well">
		
			<h3>Create New Tag</h3>

			{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => "form-control"]) }}
				{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block margin-top']) }}
			{!! Form::close() !!}

		</div>
	</div>
</div>

	<div class="text-center">
			{!! $tags->links() !!}
		</div>
		<div class="text-center form-spacing-bottom">
			Page {!! $tags->currentPage(); !!} of {!! $tags->lastPage(); !!} Pages
	</div>

@endsection