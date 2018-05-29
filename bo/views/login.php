<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view($head);?>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <?php echo validation_errors(); ?>
        <?php echo form_open('login'); ?>
          <!--div class="form-group">
            <label for="email-address">Email address</label>
            <input class="form-control" name="email_address" id="email-address" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div-->
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" name="username" value="<?php echo set_value('username');?>" id="username" type="text" aria-describedby="usernnameHelp" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" name="password" id="password" type="password" placeholder="Password">
          </div>
          <!--div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div-->
          <input type="submit" value="Submit" class="btn btn-primary btn-block" />
        <?php echo form_close(); ?>
        <!--div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div-->
      </div>
    </div>
  <?php $this->load->view($footer);?>
