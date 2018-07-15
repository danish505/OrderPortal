<div class="card mb-3">
  <div class="card-header">
  <i class="fa fa-handshake-o"></i> Service Providers
    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">
        <i class="fa fa-fw fa-plus"></i>
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Url</th>
            <th style="width: 20%;"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $class='';
            if($serviceProviders && count($serviceProviders)){
                $class='d-none';
                foreach($serviceProviders as $serviceProvider) {
                    $this->load->view('service-provider/partials/display-service-provider', ['serviceProvider' => $serviceProvider]);
                }
            }
        ?>
            <tr class="not-found <?php echo $class;?>">
              <td colspan="4">No service provider found. Click "+" above to add.</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $this->load->view('service-provider/modals/add-provider');?>
<?php $this->load->view('service-provider/modals/edit-provider');?>
<?php $this->load->view('service-provider/modals/delete-confirmation');?>