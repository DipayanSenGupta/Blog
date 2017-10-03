@extends('main')
@section('title','| Contact Page')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h3>Contact Me</h3>
            <form method="POST" action="{{url('contact')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id ="email" name="email"
                    class="form-control">    
                </div>

                  <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id ="subject" name="subject"
                    class="form-control">    
                </div>

                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id ="message" name="message"
                    class="form-control">
                    Type Your Message here
                    </textarea>    
                </div>
                    <input type="submit" value="Send Message" class="btn btn-success"> 
            </form>   
            </div>
        </div>    
    </div>

@endsection