@extends('main')
@section('title',' |Create New Post')
@section('stylesheets')

{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
 <script type="text/javascript">
       tinymce.init({
            selector: 'textarea',
            plugins:  'link code'
       });
 </script>

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<hr>
			{!! Form::open(array('route' => 'posts.store','files'=>true)) !!}
            {!! Form::label('title','Title:')!!}
            {!!Form::text('title',null,array('class'=>'form-control'))!!}
            {{Form::label('slug','Slug:')}}
            {{Form::text('slug',null,array('class'=>'form-control','minlength'=>'5','maxlength'=>'255'))}}
            {{Form::label('category_id','Category Id:')}}
            <select class="form-control" name="category_id">
            	@foreach($categories as $category)	
            	<option value="{{$category->id}}">{{$category->name}}</option>
            	@endforeach
            </select>

                {{Form::label('tags','Tags:')}}
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                  @foreach($tags as $tag)  
                  <option value="{{$tag->id}}">{{$tag->name}}</option>
                  @endforeach
            </select>

            {{Form::label('featured_image','Upload Featured Image:')}}
            {{Form::file('featured_image')}}

            {!! Form::label('body','Body:')!!}
            {!!Form::textarea('body',null,array('class'=>'form-control'))!!}
            {!! Form::submit('Create New Post',array('class' => 'btn btn-success btn-lg btn-block','style'=> 'margin-top:20px;'))!!}
			{!! Form::close() !!}	
		</div>	
	</div>

@endsection
@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}
<script type="text/javascript">
      $('.select2-multi').select2();
</script>
@endsection