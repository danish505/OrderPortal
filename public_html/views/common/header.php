<!doctype html>
<html lang="en">
<!--div class="g-recaptcha" data-sitekey="6LekK1wUAAAAAP_GmvRYBWiHxmOi8rDvgc6atO5S"></div-->
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css" />
    <title><?php echo $site_title;?></title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <div class="container-fluid">
      <header class="row">
        <div class="col-3 border-right d-none d-lg-block pl-5 pr-5 pt-2 pb-2" style="height:150px;">
          <img src="<?php echo $base_url;?>assets/images/logo.png" class="img-fluid">
        </div>
        <div class="col-lg-9 col-sm-12">
          <div class="row border-bottom h-50 align-items-center d-none d-lg-block">
            <ul class="nav" style="padding-left: 8px;">
              <?php if ($isUserLoggedIn): ?>
              <li class="nav-item"><a class="nav-link active" href="<?php $base_url;?>/my-account">My Account</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php $base_url;?>/logout">Logout</a></li>
            <?php else: ?>
              <li class="nav-item"><a class="nav-link active" href="<?php $base_url;?>/register">Register</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php $base_url;?>/login">Login</a></li>
            <?php endif;?>
            </ul>
          </div>
          <div class="row">
            <nav class="w-100 navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand d-block d-lg-none" href="#"><?php echo $site_title;?></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavigationBar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="mainNavigationBar">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>">Homepage</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>about-us">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>services">Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>patients">Patient</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>hospitals">Hospitals</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>contact-us">Contact us</a>
                  </li>
                  <?php if ($isUserLoggedIn): ?>
                  <li class="nav-item d-block d-lg-none"><a class="nav-link" href="<?php $base_url;?>/my-account">My Account</a></li>
                  <li class="nav-item d-block d-lg-none"><a class="nav-link" href="<?php $base_url;?>/logout">Logout</a></li>
                <?php else: ?>
                  <li class="nav-item d-block d-lg-none"><a class="nav-link" href="<?php $base_url;?>/register">Register</a></li>
                  <li class="nav-item d-block d-lg-none"><a class="nav-link" href="<?php $base_url;?>/login">Login</a></li>
                <?php endif;?>
                </ul>

              </div>
            </nav>
          </div>
        </div>
      </header>
