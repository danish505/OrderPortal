<div class="container">
  <div class="card mx-auto mb-5">
    <div class="card-header"><?php echo $serviceProvider->getCompanyName();?></div>
    <div class="card-body">
      <ul class="nav nav-tabs" id="service-provider" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="true">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="false">Contacts</a>
        </li>
      </ul>
      <div class="tab-content mt-2" id="serviceProviderContent">
        <div class="tab-pane fade show active" id="services" role="tabpanel" aria-labelledby="services-tab">
          <?php $this->load->view('service-provider/services', ['services' => $serviceProvider->getServices()]);?>
        </div>
        <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <?php $this->load->view('service-provider/contacts', ['contacts' => $serviceProvider->getContacts()]);?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('service-provider/modals/delete-confirmation');?>