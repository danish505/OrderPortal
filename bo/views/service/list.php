<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-briefcase"></i> Services
    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">
        <i class="fa fa-fw fa-plus"></i>
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="30%">Name</th>
            <th width="30%">Category</th>
            <th width="25%">Sub Category</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $class='';
            if($services && count($services)){
                $class='d-none';
                foreach($services as $service) {
                    $this->load->view('service/partials/display-service', ['service' => $service]);
                }
            }
        ?>
            <tr class="not-found <?php echo $class;?>">
              <td colspan="4">No service found. Click "+" above to add.</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $this->load->view('service/modals/add');?>
<?php $this->load->view('service/modals/edit');?>
<?php $this->load->view('service/modals/delete-confirmation');?>