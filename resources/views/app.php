<!doctype html>
<html ng-app="StartupUTC" lang="fr">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>StartupUTC</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Fonts and icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/material-kit.css" rel="stylesheet"/>
	<link href="assets/css/startuputc.css" rel="stylesheet" />

</head>
<body class="{{$root.bodyClass}}">

	<nav class="navbar navbar-fixed-top navbar-color-on-scroll navbar-transparent">
  	<div class="container">
      	<!-- Brand and toggle get grouped for better mobile display -->
      	<div class="navbar-header">
      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
          		<span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="#/">StartupUTC</a>
      	</div>

      	<div class="collapse navbar-collapse" id="navigation-example">
      		<ul class="nav navbar-nav navbar-left">
    				<li>
    					<a href="#/search">Explorer</a>
    				</li>
      		</ul>
					<ul class="nav navbar-nav navbar-right">
    				<li>
    					<a href="#/contact">Contact</a>
    				</li>
      		</ul>
      	</div>
  	</div>
  </nav>

  <div class="wrapper">
		<div ng-view></div>
	</div>

</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src='//www.google.com/recaptcha/api.js'></script>
	<script src="assets/js/material.min.js"></script>
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.nouislider.js" type="text/javascript"></script>
	<script src="assets/js/material-kit.js" type="text/javascript"></script>
	<script src="assets/js/ganalytics.js" type="text/javascript"></script>
	<script src="assets/js/script.js" type="text/javascript"></script>

	<!--   App   -->
	<script src="app/vendor/vendor.js" type="text/javascript"></script>
	<script src="app/env.js" type="text/javascript"></script>
	<script src="app/app.js" type="text/javascript"></script>

	<script type="text/javascript">
	$().ready(function(){
	});
	</script>
</html>
