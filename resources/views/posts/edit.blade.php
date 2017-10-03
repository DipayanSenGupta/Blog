@extends('main')
@section('title', '| Edit Post')
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

        {!!Form::model($post,['route' => ['posts.update',$post->id],'method' => 'PUT','files'=>true ])!!}
		
		<div class="col-md-8">
	     
		    {{Form::label('title','Title:')}}
		    {{Form::text('title',null,["class" =>'form-control input-lg'])}}
		    {{Form::label('slug','Slug:',['class'=>'form-spacing-top'])}}
		    {{Form::text('slug',null,["class" =>'form-control'])}}
		    {{Form::label('category_id',"Category:",['class'=>'form-spacing-top'])}}
		    {{Form::select('category_id',$categories,null,['class' => 'form-control'])}}
		    
		    {{Form::label('tags',"Tags:",
		    ['class' => 'form-spacing-top'])}}
		    {{Form::select('tags[]',$tags,null,
		    ['class'=>'select2-multi form-control','multiple'=>'multiple'])}}

		    {{Form::label('featured_Image','Update Featured Image:',['class'=>'form-spacing-top'])}}
		    {{Form::file('featured_Image')}}
		    {{Form::label('body','Body:',['class'=>'form-spacing-top'])}}
			{{Form::textarea('body',null,["class" =>'form-control'])}}
				
		</div>
	    <div class="col-md-4">
	    	<div class="well">
	    		<dl class="dl-horizontal">
	    			<dt>Created At:</dt>
	    			<dd>{{ date('j M Y,  h:i a ',strtotime($post->created_at)) }}</dd>
	    		</dl>
	    		<dl class="dl-horizontal">
	    			<dt>Last Updated:</dt>
	    			<dd>{{ date('j M Y,  h:i a ',strtotime($post->created_at)) }}</dd>
	    		</dl>
	    	</div>
	    	<hr>

	    	<div class="row">
	    		<div class="col-sm-6">
	    			{!! Html::linkRoute('posts.show','Cancel',array($post->id),array(
	    			'class'=>'btn btn-primary btn-block'))!!}
	    			
	    			
	    		</div>
	    		<div class="col-sm-6">
	    			{!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) !!}

	    		</div>
	    	</div>
	    </div>
	    {!! Form::close()!!}
	    @section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}
<script type="text/javascript">
	$('.select2-multi').select2();
	$('.select2-multi').select2().val( {!! json_encode($post->tags()->getRelatedIds())!!}).trigger('change');
</script>

@endsection
	</div>{{-- End of .row(form) --}}
	

	
	
@endsection