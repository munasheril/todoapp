<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
                 }
        </style>
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/daterangepicker.css">
        <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="#">Project name</a>-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li> <a href="{{ route('projects.index') }}">Projects</a></li>
          <li> <a href="{{ route('users.index') }}">Users</a></li>
          
        </ul>
        
          <div class="navbar-right">
          <ul class="nav navbar-nav">     
          <li class="dropdown">
          <a href="#" class="dropdown-toggle"  data-toggle="dropdown">Hi {{Auth::user()->name}},&nbsp;<span class="caret"></span> </a>
          <ul class="dropdown-menu">
          <li> <a href="{{route('users.show',Auth::user()->id )}}">Profile</a></li>
          <li> <a href="{{route('users.edit', Auth::user()->id )}}">Change password</a></li>

          <li role="presentation" ><a href="{{route('users.mytask')}}">My Tasks <span class="badge pull-right" >{{Auth::user()->assignedTasks()->where('completed',false)->count()}}</span></a>
          </li>
          <li> <a href="/logout">Logout</a></li>
          </ul>  
          </li>
          </ul>          
            </div><!--/.navbar-collapse -->
          </div>
        </nav>
        <div class="container" style="padding-top:10px">
        @if (session('message'))
		          <div class="alert alert-info">
		            	<p>{{session('message') }}</p>
		          </div>
    </div>
	@endif
   @if ($errors->any())
		<div class='alert alert-danger'>
			@foreach ( $errors->all() as $error )
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
@yield('content')

      <footer>
        <p>&copy; Company 2015</p>
      </footer>
               
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="/js/vendor/bootstrap.min.js"></script>
        <script src="/js/vendor/moment.js"></script>
        <script src="/js/vendor/daterangepicker.js"></script>

        <script src="/js/main.js"></script>
        @yield('scripts')

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
            
        </script>
    </body>
</html>
