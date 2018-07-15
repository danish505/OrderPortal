<table class="table table-bordered" id="serviceDataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>
        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#serviceAddModal">
            <i class="fa fa-fw fa-plus"></i>
        </button>
        </th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $class='';
        if($services && count($services)){
            $class='d-none';
            foreach($services as $service) {
                $this->load->view('service-provider/service/partials/display-service', ['service' => $service]);
            }
        }
    ?>
        <tr class="not-found <?php echo $class;?>">
            <td colspan="4">No service found. Click "+" above to add.</td>
        </tr>
    </tbody>
</table>
<?php $this->load->view('service-provider/service/modals/add-service');?>
<?php $this->load->view('service-provider/service/modals/edit-service');?>
<?php $this->load->view('service-provider/service/modals/delete-confirmation');?>