<?php
use App\Post;
?>
@extends('main')
@section('title','| Delete Comment')
@section('content')
	<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<h3>Delete the comment ?</h3>
			<p>
				<strong>Name: </strong>{{$comment->name}}<br>
				<strong>Email: </strong>{{$comment->email}}<br>
				<strong>Comment:</strong>{{$comment->comment}}<br>
				</p>
				{{Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE'])}}
					{{Form::submit('Yes Delte the Comment',['class' => 'btn btn-lg btn-block btn-danger'])}}
					{!! Html::linkRoute('posts.show','Cancel',array($post->id),array(
	    			'class'=>'btn btn-primary btn-block'))!!}
					{{Form::close()}}
		</div>
	</div>
@endsection