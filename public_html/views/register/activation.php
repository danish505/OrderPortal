<div class="container">
  <div class="card card-login mx-auto mt-5 mb-5" style="width: 50rem">
    <div class="card-header">User Activation</div>
    <div class="card-body">
      <?php echo form_open('', ['id'=>'user_activation']); ?>
      <div class="alert alert-secondary" role="alert">
        Setup your password to activate your account.
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="password" name="password">
          <?php echo form_error('password'); ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="confirm_password" name="confirm_password">
          <?php echo form_error('confirm_password'); ?>
        </div>
      </div>
      <input type="submit" value="Submit" class="btn btn-primary float-right" />
      <?php echo form_close(); ?>
    </div>
    </div>
  </div>
