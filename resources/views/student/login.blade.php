@extends('student.layouts.layout-empty')
@section('content')
<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
<div class="background-image"></div>
<div class="container login">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			  		@if (session('warning'))
					    <div class="alert alert-warning alert-dismissible" role="alert">
					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        {{ session('warning') }}
					    </div>
					@endif
			    	<form accept-charset="UTF-8" role="form" method="post" action="/student/login">
			    	{{ csrf_field() }}
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Matric Number" name="username" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<style>
.background-image {
    position: fixed;
    left: 0;
    right: 0;
    z-index: 1;

    display: block;
    background-image: url(/img/caleb_university.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;

    width: 1400px;
    height: 800px;

    -webkit-filter: blur(5px);
    -moz-filter: blur(5px);
    -o-filter: blur(5px);
    -ms-filter: blur(5px);
    filter: blur(5px);
}

.login {
    z-index: 999;
    position: fixed;
}

body {
    /*background: url(/img/caleb_university.jpg);
  	background-position: center;
	background-repeat: no-repeat;
	background-size: contain;*/
}

.vertical-offset-100{
    padding-top:100px;
}
</style>
<script type="text/javascript">
	$(document).ready(function(){
	  $(document).mousemove(function(e){
	     TweenLite.to($('body'), 
	        .5, 
	        { css: 
	            {
	                backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
	            }
	        });
	  });
	});
</script>
@endsection
