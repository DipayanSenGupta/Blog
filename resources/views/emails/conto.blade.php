@extends('main')
@section('title', '| Edit Post')

@section('content')
	<div class="row">

        {!!Form::model({{url('contact')}}'method' => 'PATCH' )!!}
		<div class="row">
		<div class="col-md-12">
	     
		    {{Form::label('email','Email:')}}
		    {{Form::text('email',null,["class" =>'form-control input-lg'])}}
		    {{Form::label('subject','Subject:',['class'=>'form-spacing-top'])}}
		    {{Form::text('subject',null,["class" =>'form-control'])}}
		    {{Form::label('message',"Message:")}}
		    {{Form::text('message',null,["class" =>'form-control'])}}
		    
		    {!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) !!}
		    {!! Form::close()!!}

		</div>
		</div>
	    
@endsection
