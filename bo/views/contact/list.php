<div class="card mb-3">
  <div class="card-header">
  <i class="fa fa-user"></i> Contacts
    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#contactAddModal">
        <i class="fa fa-fw fa-plus"></i>
    </button>
  </div>
  <div class="card-body">
  <ul class="list-group mt-2 contacts-list">
    <?php 
    $class='';
    if($contacts && count($contacts)){
        $class='d-none';
        foreach($contacts as $contact) {
            $this->load->view('contact/partials/display-contact', ['contact' => $contact]);
        }
    }
    
    ?>
    <li class="list-group-item not-found <?php echo $class;?>">No contact found. Click "+" above to add.</li>
</ul>
  </div>
</div>
<!-- Modals -->
<?php $this->load->view('contact/modals/address-add');?>
<?php $this->load->view('contact/modals/address-edit');?>
<?php $this->load->view('contact/modals/contact-add');?>
<?php $this->load->view('contact/modals/contact-edit');?>
<?php $this->load->view('contact/modals/email-add');?>
<?php $this->load->view('contact/modals/email-edit');?>
<?php $this->load->view('contact/modals/phone-add');?>
<?php $this->load->view('contact/modals/phone-edit');?>
<?php $this->load->view('contact/modals/delete-confirmation');?>