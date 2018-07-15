<div class="row">
    <div class="col-12">
        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#contactAddModal">
            <i class="fa fa-fw fa-user-plus"></i>
        </button>
    </div>
</div>
<ul class="list-group mt-2 service-provider-contacts-list">
    <?php 
    $class='';
    if($contacts && count($contacts)){
        $class='d-none';
        foreach($contacts as $contact) {
            $this->load->view('service-provider/contact/partials/display-contact', ['contact' => $contact]);
        }
    }
    
    ?>
    <li class="list-group-item not-found <?php echo $class;?>">No contact found. Click "+" above to add.</li>
</ul>
<!-- Modals -->
<?php $this->load->view('service-provider/contact/modals/address-add');?>
<?php $this->load->view('service-provider/contact/modals/address-edit');?>
<?php $this->load->view('service-provider/contact/modals/contact-add');?>
<?php $this->load->view('service-provider/contact/modals/contact-edit');?>
<?php $this->load->view('service-provider/contact/modals/email-add');?>
<?php $this->load->view('service-provider/contact/modals/email-edit');?>
<?php $this->load->view('service-provider/contact/modals/phone-add');?>
<?php $this->load->view('service-provider/contact/modals/phone-edit');?>