<div class="card mb-3">
  <div class="card-header">
  <i class="fa fa-hospital-o"></i> Hospitals
    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#hospitalAddModal">
        <i class="fa fa-fw fa-plus"></i>
    </button>
  </div>
  <div class="card-body">
  <ul class="list-group mt-2 hospitals-list">
    <?php 
    $class='';
    if($hospitals && count($hospitals)){
        $class='d-none';
        foreach($hospitals as $hospital) {
            $this->load->view('hospital/partials/display-hospital', ['hospital' => $hospital]);
        }
    }
    
    ?>
    <li class="list-group-item not-found <?php echo $class;?>">No hospital found. Click "+" above to add.</li>
</ul>
  </div>
</div>
<!-- Modals -->
<?php $this->load->view('hospital/modals/hospital-add');?>
<?php $this->load->view('hospital/modals/hospital-edit');?>
<?php $this->load->view('hospital/modals/affiliate-add');?>
<?php $this->load->view('hospital/modals/contact-add');?>
<?php $this->load->view('hospital/modals/department-add');?>
<?php $this->load->view('hospital/modals/service-add');?>
<?php $this->load->view('hospital/modals/delete-confirmation');?>