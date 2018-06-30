<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-hospital-o"></i> Hospitals</div>
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
          <?php foreach ($hospitals as $hospital):?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a class="nav-link" href="<?php echo $base_url;?>hospital/<?php echo $hospital->getId();?>"><i class="fa fa-fw fa-eye"></i></a></td>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
  <!--div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div-->
</div>
