@extends('main')

@section('stylesheets')
	{!!Html::style('css/styles.css')!!}
@endsection

@section('title', '| View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
		
			<img class="image" src="{{ asset('images/' . $post->image) }}" height="300" width="400">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!}</p>

			<hr>
		
			<div class="tags">
			@foreach($post->tags as $tag)
				<span class="label label-default">{{$tag->name}}</span>
			@endforeach
			</div>
		
			<div class="col-md-12">
				<h3>Comments <small>{{ $post->comments->count() }} total</small></h3>
				<table class="table">
					<thead>
						<th>Id</th>
						<th>Name</th>
						<th>email</th>
						<th>Comment</th>
						<th>Created</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						@foreach($post->comments as $comment)
						<tr>
							<th>{{ $comment->id }}</th>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>{{ date('M j, Y',strtotime($comment->created_at)) }}</td>
							<td><a href="{{route('comments.edit', $comment->id)}} " class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a></td>
							<td>{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete', 'onsubmit' => "return confirm('Are you sure you want to delete?')"]) !!}

								

								{!! Form::button('<span class="glyphicon glyphicon-trash"></span>', ['class' => "btn btn-xs btn-danger", 'type' => 'submit']) !!}

								{!! Form::close() !!}
							

							


							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-md-4 margin-top">
			<div class="well">
				<dl>
					<dt>URL:</dt>
					<dd> <a href= "{{url('blog/' . $post->slug)}}">{{url('blog/' . $post->slug)}}</a></dd>
					<dt>Category:</dt>
					<dd>{{ $post->category->name }}</dd>
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