@extends('main')
@section('title',' |Edit Comment')
@section('content')
	<h1>Edit Comment</h1>
	
	<div class="row">
	<div class="col-md-8 col-md-offset-2">
	{{Form::model($comment,['route'=> ['comments.update',$comment->id],'method'=>'PUT'])}}
		{{Form::label('name','Name:')}}
		{{Form::text('name',null,['class' => 'form-control','disabled'=>''])}}

		{{Form::label('email','Email:')}}
		{{Form::text('email',null,['class' => 'form-control','disabled'=>''])}}

		{{Form::label('comment','Comment:')}}
		{{Form::text('comment',null,['class' => 'form-control'])}}

		{{Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px'])}}
	{{Form::close()}}	
    </div>
    </div>
@endsection