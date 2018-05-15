<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>404 Not Found - <?php echo $site_title; ?></title>

   	<!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" >
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/slick.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.min.css'); ?>">

	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">


	<!-- icons -->
	<link rel="icon" href="<?php echo base_url('assets/images/ico/favicon.ico'); ?>">
	<link rel="icon" sizes="192x192" href="<?php echo base_url('assets/images/ico/icon-192.png'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/images/ico/apple-touch-icon-144-precomposed.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/images/ico/apple-touch-icon-114-precomposed.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/images/ico/apple-touch-icon-72-precomposed.png'); ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/images/ico/apple-touch-icon-57-precomposed.png'); ?>">
    <!-- icons -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<header class="tr-header">
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo base_url(''); ?>"><img class="img-responsive" width="250" src="<?php echo base_url('assets/images/logo.jpg'); ?>" alt="<?php echo $site_title; ?>"></a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>

				</div>
				<!-- /.navbar-header -->

				<div class="navbar-left">
					<div class="collapse navbar-collapse" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li <?php if($this->router->fetch_class() == 'main') { echo 'class="active"'; } ?>><a href="<?php echo base_url(''); ?>">Home</a></li>
							<li class="tr-dropdown <?php if($this->router->fetch_class() == 'jobs') { echo 'active'; } ?>"><a href="#" onclick="event.preventDefault();">Jobs</a>
								<ul class="tr-dropdown-menu tr-list fadeInUp" role="menu">
							        <li <?php if($this->router->fetch_class() == 'jobs' && $this->router->fetch_method() != 'category_list' && $this->router->fetch_method() != 'city_list') { echo 'class="active"'; } ?>><a href="<?php echo base_url('jobs'); ?>">All Jobs</a></li>
							        <li <?php if($this->router->fetch_class() == 'jobs' && $this->router->fetch_method() == 'category_list') { echo 'class="active"'; } ?>><a href="<?php echo base_url('jobs/categories'); ?>">Jobs by Category</a></li>
							        <li <?php if($this->router->fetch_class() == 'jobs' && $this->router->fetch_method() == 'city_list') { echo 'class="active"'; } ?>><a href="<?php echo base_url('jobs/cities'); ?>">Jobs by City</a></li>
								</ul>
							</li>
							<li <?php if($this->router->fetch_class() == 'resources') { echo 'class="active"'; } ?>><a href="<?php echo base_url('resources'); ?>">Resources</a></li>
							<li <?php if($this->router->fetch_class() == 'statics' && $this->router->fetch_method() == 'contact') { echo 'class="active"'; } ?>><a href="<?php echo base_url('contact'); ?>">Contact</a></li>
						</ul>
					</div>
				</div><!-- /.navbar-left -->
				<div class="navbar-right">
					<?php if($this->isloggedin) { ?>
					<div class="dropdown tr-change-dropdown">
						<i class="fa fa-user"></i>
						<a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text"><?php echo $this->user->first_name; ?></span><i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu tr-change tr-list">
							<li><a href="<?php echo base_url('profile'); ?>">Edit Profile</a></li>
							<li><a href="<?php echo base_url('jobs'); ?>">My Jobs</a></li>
							<li><a href="<?php echo base_url('password'); ?>">Change Password</a></li>
							<li><a href="<?php echo base_url('logout'); ?>">Log Out</a></li>
						</ul>
					</div><!-- /.language-dropdown -->
					<?php } else { ?>
					<ul class="sign-in tr-list">
						<li><i class="fa fa-user"></i></li>
						<li><a href="<?php echo base_url('login'); ?>">Log In </a></li>
						<li><a href="<?php echo base_url('register'); ?>">Register</a></li>
					</ul><!-- /.sign-in -->
					<?php } ?>
					<a href="<?php echo $this->config->config['employer_url']; ?>" class="btn btn-primary">Employers</a>
				</div><!-- /.nav-right -->
			</div><!-- /.container -->
		</nav><!-- /.navbar -->
	</header><!-- /.tr-header -->

	<div class="page-content">
		<div class="container">
			<div class="tr-found section">
				<div class="row">
					<div class="col-sm-12">
						<p> Coming Soon </p>
					</div>

				</div><!-- /.row -->
			</div><!-- /.section -->
		</div><!-- /.container -->
	</div><!-- /.page-content -->

	<div class="footer">
		<div class="footer-bottom">
			<div class="container">
				<div class="copyright">
					<p>Copyright © <?php echo date('Y'); ?> <a href="<?php echo base_url(''); ?>"><?php echo $site_title; ?>.</a> All rights reserved.</p>
				</div>
			</div>
		</div><!-- /.footer-bottom -->
	</div><!-- /.footer -->


    <!-- JS -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/counterup.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/slick.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
	<script type="text/javascript">
		var base_url = "<?php echo base_url(); ?>";
	</script>
  </body>
</html>
