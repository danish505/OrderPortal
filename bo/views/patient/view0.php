<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-wheelchair"></i> <?php echo $patient->details->getDisplayName();?></div>
  <div class="card-body">
    <div class="form-group row">
      <label for="username" class="col-sm-3 col-form-label">Username</label>
      <div class="col-sm-9"><?php echo $patient->getUserName();?></div>
    </div>
    <div class="form-group row">
      <label for="salutation" class="col-sm-3 col-form-label">Salutation</label>
      <div class="col-sm-9"><?php echo $patient->details->getSalutation();?></div>
    </div>
    <div class="form-group row">
      <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
      <div class="col-sm-9"><?php echo $patient->details->getFirstName();?></div>
    </div>
    <div class="form-group row">
      <label for="middle_name" class="col-sm-3 col-form-label">Middle Name</label>
      <div class="col-sm-9"><?php echo $patient->details->getMiddleName();?></div>
    </div>
    <div class="form-group row">
      <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
      <div class="col-sm-9"><?php echo $patient->details->getLastName();?></div>
    </div>
    <div class="form-group row">
      <label for="email_address" class="col-sm-3 col-form-label">Email Address</label>
      <div class="col-sm-9"><?php echo $patient->getEmail();?></div>
    </div>
    <div class="form-group row">
      <label for="gender" class="col-sm-3 col-form-label">Gender</label>
      <div class="col-sm-9"><?php echo $genderMap[$patient->details->getGender()];?></div>
    </div>
    <div class="form-group row">
      <label for="age" class="col-sm-3 col-form-label">Age</label>
      <div class="col-sm-9"><?php echo $patient->details->getAge();?></div>
    </div>
    <div class="form-group row">
      <label for="status" class="col-sm-3 col-form-label"></label>
      <div class="col-sm-9"><span class="badge badge-<?php echo $statusClassMap[$patient->getStatus()];?>"><?php echo $statusMap[$patient->getStatus()];?></span></div>
    </div>
  </div>
</div>
