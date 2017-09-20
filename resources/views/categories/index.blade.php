@extends('main')

@section('stylesheets')
  {!!Html::style('css/styles.css')!!}
@endsection

@section('title', '| All Categories')

@section('content')

<div class="row">
	<div class="col-md-8">

	<h1>Categories</h1>

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
			@foreach($categories as $category)
			<tr>
				<th>{{ $category->id }}</th>
				<td>{{ $category->name }}</td>
				<td><a href="{{ route('categories.show', $category->id) }}" class='btn btn-default btn-sm' >View</a>

				<td><a href="{{ route('categories.edit', $category->id) }}" class='btn btn-default btn-sm' >Edit</a></td>
				
				<td>{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete', 'onsubmit' => "return confirm('Are you sure you want to delete?')"]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
						{!! Form::close() !!}</td>
			</tr>
			@endforeach
		</tbody>
		
		</table>
	</div>

	<div class="col-md-3 col-md-offset-1">
		<div class="well">
		
			<h3>Create New Category</h3>

			{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => "form-control"]) }}
				{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block margin-top']) }}
			{!! Form::close() !!}

		</div>
	</div>
</div>

	<div class="text-center">
			{!! $categories->links() !!}
		</div>
		<div class="text-center form-spacing-bottom">
			Page {!! $categories->currentPage(); !!} of {!! $categories->lastPage(); !!} Pages
	</div>

@endsection