<div class="container">
  <div class="card card-login mx-auto mt-5 mb-5" style="width: 50rem">
    <div class="card-header">Patient Registration</div>
    <div class="card-body">
      <?php if ($user_creation_successful):
          $vurl = $base_url.'v/p/'.$code;
        ?>
      <div class="alert alert-success" role="alert">
        Registration successful. Kindly check your email for verification link.<!-- Verify by clicking <a href="<?php echo $vurl;?>"><?php echo $vurl;?></a-->
      </div>
      <?php endif;?>
      <?php echo form_open('register-patient'); ?>
      <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label">Username</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="username" name="username">
          <?php echo form_error('username'); ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="salutation" class="col-sm-3 col-form-label">Salutation</label>
        <div class="col-sm-9">
          <select class="form-control" name="salutation" id="salutation">
            <option value="Mr.">Mr.</option>
            <option value="Ms.">Ms.</option>
            <option value="Mrs.">Mrs.</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="first_name" name="first_name">
          <?php echo form_error('first_name'); ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="middle_name" class="col-sm-3 col-form-label">Middle Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="middle_name" name="middle_name">
        </div>
      </div>
      <div class="form-group row">
        <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="last_name" name="last_name">
          <?php echo form_error('last_name'); ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="email_address" class="col-sm-3 col-form-label">Email Address</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" id="email_address" name="email_address">
          <?php echo form_error('email_address'); ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="gender" class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-9">
          <select class="form-control" name="gender" id="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="age" class="col-sm-3 col-form-label">Age</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" id="age" name="age" min="1">
          <?php echo form_error('age'); ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="age" class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
          <?php echo form_error('captcha'); ?>
          <div class="g-recaptcha" data-sitekey="<?php echo $GOOGLE_CAPTCHA_SITE_KEY;?>"></div>
        </div>
      </div>
      <input type="submit" value="Submit" class="btn btn-primary float-right" />
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
</div>
