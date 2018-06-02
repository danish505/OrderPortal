<div class="container">
    <div class="card card-login mx-auto mt-5 mb-5" style="width: 20rem">
      <div class="card-header">Login</div>
      <div class="card-body">
        <?php if ($this->input->get('activation') === '1'):?>
        <div class="alert alert-success" role="alert">
          User has been activated. Kindly login to access your account.
        </div>
      <?php endif;?>
        <?php echo validation_errors(); ?>
        <?php echo form_open('login'); ?>
          <div class="form-group">
            <label for="login_as">Login As</label>
            <select class="form-control" name="login_as" id="login_as">
              <option value="<?php echo GptUser::USER_ROLE_PATIENT;?>">Patient</option>
              <!--option value="<?php echo GptUser::USER_ROLE_HOSPITAL_REP;?>">Hospital</option-->
              <!--option value="<?php echo GptUser::USER_ROLE_SERVICE_PROVIDER;?>">Service Provider</option-->
            </select>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" name="username" value="<?php echo set_value('username');?>" id="username" type="text" aria-describedby="usernnameHelp" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" name="password" id="password" type="password" placeholder="Password">
          </div>
          <input type="submit" value="Submit" class="btn btn-primary btn-block" />
        <?php echo form_close(); ?>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo $base_url;?>register-patient">Register an Account</a>
          <a class="d-block small" href="<?php echo $base_url;?>recover-password">Forgot Password?</a>
        </div>
      </div>
    </div>
</div>
