@extends('main')
@section('title',' | All Posts')
@section('content')

<div class="row">
	<div class="col-md-10">
		<h1>All Posts</h1>
	</div>
	<div class="col-md-2">
		<a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
	</div>
	<hr>
<div class="col-md-12">
<hr>
</div>
</div>{{-- End of row --}}

<div class="row">
<div class="col-md-12">
<table class="table">
	<thead>
	<th></th>
	<th>Title</th>
	<th>Body</th>
	<th>Created At</th>
	</thead>
	<tbody>
		@foreach($posts as $post)
		<tr>
			<th>{{$post->id}}</th>
			<th>{{$post->title}}</th>
			<th>{{ substr(strip_tags($post->body),0, 50)}}{{ strlen(strip_tags($post->body))>50 ? "...": '' }}
			</th>
			<th>{{ date('M j, Y' ,strtotime($post->created_at)) }}</th>
			<td><a href="{{ route('posts.show',$post->id)}}" class="btn btn-default">View</a>
            <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-default">Edit</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="text-center">
	{!! $posts->links();!!}
</div>
</div>	
</div>


@stop