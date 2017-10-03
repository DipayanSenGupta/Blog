@extends('main')
@section('title',"| Edit Categories")
@section('content')
	
 		{{Form::model($category,['route' =>['categories.update', $category->id],'method' => "PUT"])}}
		{{Form::label('name',"Title:")}}
		{{Form::text('name',null,
		['class' => 'form-control'])}}

		{{Form::submit('Save Changes',['class' => 'btn btn-success','style' => 'margin-top:20px'])}}
		{{Form::close()}}
@endsection