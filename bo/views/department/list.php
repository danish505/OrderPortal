<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-group"></i> Departments
    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">
        <i class="fa fa-fw fa-plus"></i>
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="85%">Name</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $class='';
            if($departments && count($departments)){
                $class='d-none';
                foreach($departments as $department) {
                    $this->load->view('department/partials/display-department', ['department' => $department]);
                }
            }
        ?>
            <tr class="not-found <?php echo $class;?>">
              <td colspan="4">No department found. Click "+" above to add.</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $this->load->view('department/modals/add');?>
<?php $this->load->view('department/modals/edit');?>
<?php $this->load->view('department/modals/delete-confirmation');?>