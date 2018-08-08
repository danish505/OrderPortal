<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-wheelchair"></i> Patients</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($patients as $patient):?>
          <tr>
            <td><?php echo $patient->details->getDisplayName();?></td>
            <td><a href="mailto:<?php echo $patient->getEmail();?>"><?php echo $patient->getEmail();?></a></td>
            <td><?php echo $genderMap[$patient->details->getGender()]?></td>
            <td><?php echo $patient->details->getAge();?></td>
            <td><span class="badge badge-<?php echo $statusClassMap[$patient->getStatus()];?>"><?php echo $statusMap[$patient->getStatus()];?></span></td>
            <td>
            <div class="btn-group pt-1 float-right" role="group">
                <a class="btn btn-secondary btn-sm" href="<?php echo $base_url;?>patient/<?php echo $patient->getId();?>"><i class="fa fa-fw fa-edit"></i></a></td>
            </div>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
  <!--div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div-->
</div>
