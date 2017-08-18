@extends('admin.layouts.layout-empty')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>

<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->

<div class="container">
    <div class="row vertical-offset-100 animated bounce" id="login">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="small-box bg-yellow">
                <div class="inner">
                  	<h3>Admin</h3>
                  	<p>Login</p>
                </div>
                <div class="icon">
                	<i class="ion ion-person-add"></i>
                </div>
                <a href="/admin" class="small-box-footer">Click here to login <i class="fa fa-arrow-circle-right"></i></a>
            </div>
		</div>
		<div class="col-md-4 col-md-offset-4">
    		<div class="small-box bg-green">
                <div class="inner">
                  	<h3>Staff</h3>
                  	<p>Login</p>
                </div>
                <div class="icon">
                	<i class="ion ion-person-add"></i>
                </div>
                <a href="/staff" class="small-box-footer">Click here to login <i class="fa fa-arrow-circle-right"></i></a>
            </div>
		</div>
		<div class="col-md-4 col-md-offset-4">
    		<div class="small-box bg-red">
                <div class="inner">
                  	<h3>Student</h3>
                  	<p>Login</p>
                </div>
                <div class="icon">
                	<i class="ion ion-person-add"></i>
                </div>
                <a href="/student" class="small-box-footer">Click here to login <i class="fa fa-arrow-circle-right"></i></a>
            </div>
		</div>
	</div>
</div>
@endsection
@section('script')
<style>
body {
    background: url(/img/caleb_university.jpg);
  	background-position: center;
	background-repeat: no-repeat;
	background-size: contain;
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
