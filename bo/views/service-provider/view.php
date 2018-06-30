<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-wheelchair"></i>
    <?php echo $patient->details->getDisplayName();?>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <tbody>
        <tr>
          <td scope="col colsm-3">Username</td>
          <td scope="col col-sm-9">
            <?php echo $patient->getUserName();?>
          </td>
        </tr>
        <tr>
          <td scope="col colsm-3">Salutation</td>
          <td scope="col col-sm-9">
            <?php echo $patient->details->getSalutation();?>
          </td>
        </tr>
        <tr>
          <td scope="col colsm-3">First Name</td>
          <td scope="col col-sm-9">
            <?php echo $patient->details->getFirstName();?>
          </td>
        </tr>
        <tr>
          <td scope="col colsm-3">Middle Name</td>
          <td scope="col col-sm-9">
            <?php echo $patient->details->getMiddleName();?>
          </td>
        </tr>
        <tr>
          <td scope="col colsm-3">Last Name</td>
          <td scope="col col-sm-9">
            <?php echo $patient->details->getLastName();?>
          </td>
        </tr>
        <tr>
          <td scope="col colsm-3">Email Address</td>
          <td scope="col col-sm-9">
            <?php echo $patient->getEmail();?>
          </td>
        </tr>
        <tr>
          <td scope="col colsm-3">Gender</td>
          <td scope="col col-sm-9">
            <?php echo $genderMap[$patient->details->getGender()];?>
          </td>
        </tr>
        <tr>
          <td scope="col colsm-3">Age</td>
          <td scope="col col-sm-9">
            <?php echo $patient->details->getAge();?>
          </td>
        </tr>
        <tr>
          <td scope="col colsm-3">Status</td>
          <td scope="col col-sm-9"><span class="badge badge-<?php echo $statusClassMap[$patient->getStatus()];?>"><?php echo $statusMap[$patient->getStatus()];?></span></td>
        </tr>
      </tbody>
    </table>
    <a class="btn btn-primary float-right" href="<?php echo $base_url;?>" role="button">Back</a>
  </div>
</div>
