<div class="mt-5">
    <?php if ($profile_update_successful):?>
        <div class="alert alert-success" role="alert">Your profile has been updated successfully.</div>
    <?php endif;?>
    <?php echo form_open('', ['id' => 'frm_patient_profile']); ?>
    <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label">Username</label>
        <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext" value="<?php echo $user->getUserName();?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="salutation" class="col-sm-3 col-form-label">Salutation</label>
        <div class="col-sm-9">
            <select class="form-control" name="salutation" id="salutation">
            <?php $userSalutation = $user_detail->getSalutation();
            foreach ($salutations as $salutation):?>
                <option value="<?php echo $salutation;?>"<?php echo ($salutation === $userSalutation)?' selected':'';?>><?php echo $salutation;?></option>
            <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_detail->getFirstName();?>">
            <?php echo form_error('first_name'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="middle_name" class="col-sm-3 col-form-label">Middle Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $user_detail->getMiddleName();?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user_detail->getLastName();?>">
            <?php echo form_error('last_name'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="email_address" class="col-sm-3 col-form-label">Email Address</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email_address" name="email_address" value="<?php echo $user->getEmail();?>">
            <?php echo form_error('email_address'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="gender" class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-9">
            <select class="form-control" name="gender" id="gender">
                <option value="M"<?php echo ($user_detail->getGender() === 'M')?' selected':'';?>>Male</option>
                <option value="F"<?php echo ($user_detail->getGender() === 'F')?' selected':'';?>>Female</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="age" class="col-sm-3 col-form-label">Age</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" id="age" name="age" min="1" value="<?php echo $user_detail->getAge();?>">
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
    <input type="submit" value="Update Profile" class="btn btn-primary float-right" />
    <?php echo form_close(); ?>
</div>