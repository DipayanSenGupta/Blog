@extends('main')
@section('title', '| Blog')
@section('content')
 <div class="row">
 	<div class="col-md-8 col-md-offset-2">
 		<h1>Blog</h1>
 		<hr>
 	</div>
 </div>

@foreach ($posts as $post)
 <div class="row">
 	<div class="col-md-8 col-md-offset-2">
 		@if($post->image!=null)
		<img src="{{asset('images/'.$post->image)}}" height="400" width=400/>
		@endif
 		<h1>{{ $post->title }}</h1>
 		<h5>Published : {{date("jS F, Y",strtotime($post->created_at))}}</h5>
 		<p>{{substr(strip_tags($post->body),0,150)}}{{ strlen(strip_tags($post->body))>150 ? '...':""}}</p>
 		<a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
 	    
 	    <hr>
 	</div>
 </div>
@endforeach
 <div class="row">
 	<div class="col-md-12">
 		<div class="text-center">
 			{!! $posts->links() !!}
 		</div>
 	</div>
 	
 </div>
@endsection