<div class="container">
  <div class="card card-login mx-auto mt-5 mb-5" style="width: 50rem">
    <div class="card-header">Patient Registration</div>
    <div class="card-body">
      <?php if ($user_creation_successful):?>
      <div class="alert alert-success" role="alert">Registration successful. Kindly check your email for verification link.</div>
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
        <?php foreach ($salutations as $salutation):?>
          <option value="<?php echo $salutation;?>"><?php echo $salutation;?></option>
        <?php endforeach;?>
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
        <label for="date_of_birth" class="col-sm-3 col-form-label">Date of Birth</label>
        <div class="col-sm-9">
          <input type="text" class="form-control gpt-datepicker" id="date_of_birth" name="date_of_birth" readonly="readonly">
          <?php echo form_error('date_of_birth'); ?>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label"></label>
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
