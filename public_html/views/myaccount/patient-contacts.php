<div class="row">
    <div class="col-12">
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#contactAddModal">
            <i class="fa fa-fw fa-user-plus"></i>
        </button>
    </div>
</div>
<ul class="list-group mt-2 patient-contacts-list">
    <?php $this->load->view('myaccount/partials/display-contact');?>
</ul>
<!-- Modals -->
<?php $this->load->view('myaccount/modals/address-add');?>
<?php $this->load->view('myaccount/modals/address-edit');?>
<?php $this->load->view('myaccount/modals/contact-add');?>
<?php $this->load->view('myaccount/modals/contact-edit');?>
<?php $this->load->view('myaccount/modals/email-add');?>
<?php $this->load->view('myaccount/modals/email-edit');?>
<?php $this->load->view('myaccount/modals/phone-add');?>
<?php $this->load->view('myaccount/modals/phone-edit');?>