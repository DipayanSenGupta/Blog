@extends('main')

@section('title','| Home Page')

@section('content')
<!-- jumbotron container start -->
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="jumbotron">
  <h1>Hello, world!</h1>
  <p>...</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div><!-- end of jumbotron -->
</div><!-- end of jumbotron .col-md-12 -->
</div><!-- end of jumbotron .row -->

<div class="row">
    <div class="col-md-8">
    @foreach($posts as $post)
        <div class='post'>
            <h3> {{$post->title}}</h3>
            <p>{{substr(strip_tags($post->body),0,25)}}{{strlen(strip_tags($post->body))>300?"...":""}}</p>
            <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>   
        </div>
        <hr>
    @endforeach    
    </div>
    <div class="col-md-3 col-md-offset-1">
        <h3> Side Bar</h3>
    </div>
</div>

</div><!-- end of jumbotron .container -->
<!-- jumbotron container End-->

  @endsection