<!DOCTYPE html>
<html lang="en">
@include('partials._head')
 
  <body>

@include('partials._nav')
<div class="container">
	@include('partials._messages')
    @yield('content')    
</div>
@include('partials._footer')

<!-- end of .container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
@include('partials._javascript')
@yield('scripts')   
  </body>
</html>