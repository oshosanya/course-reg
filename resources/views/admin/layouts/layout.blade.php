<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	    <link href="/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	    <link href="/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	    <link href="/css/style.css" rel="stylesheet" type="text/css" />
	    <script type="text/javascript" src="/js/jquery.min.js"></script>
    </head>
    <body class="skin-blue sidebar-mini">
    	<div class="wrapper">
    		@include('admin.layouts.header')
		    @include('admin.layouts.sidebar')
		    <!-- Content Wrapper. Contains page content -->
		    <div class="content-wrapper">
		    	<section class="content-header">
		          <h1>
		            Dashboard
		            <small>Control panel</small>
		          </h1>
		          <ol class="breadcrumb">
		            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li class="active">Dashboard</li>
		          </ol>
		        </section>
		        <div class="container" style="margin-top: 10px"> 
		        @if (count($errors) > 0)
				    <div class="alert alert-danger alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				@if (session('success'))
				    <div class="alert alert-success alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        {{ session('success') }}
				    </div>
				@endif
				@if (session('warning'))
				    <div class="alert alert-warning alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        {{ session('warning') }}
				    </div>
				@endif
				</div>

		        <!-- Main content -->
		        <section class="content">
		   			 @yield('content')
		   		</section>
		    </div>
	    </div>
    </body>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script src="/js/admin.min.js" type="text/javascript"></script>
</html>