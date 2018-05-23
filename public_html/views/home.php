<?php $this->load->view('common/header');?>
<div class="row">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo $base_url; ?>assets/images/slider-1.jpg" class="img-fluid" />
      </div>
      <div class="carousel-item">
        <img src="<?php echo $base_url; ?>assets/images/slider-5.jpg" class="img-fluid" />
      </div>
      <div class="carousel-item">
        <img src="<?php echo $base_url; ?>assets/images/slider-6.jpg" class="img-fluid" />
      </div>
      <div class="carousel-item">
        <img src="<?php echo $base_url; ?>assets/images/slider-7.jpg" class="img-fluid" />
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="row pr-5 pl-5 pt-5">
  <div class="col-md-6 col-sm-12 align-items-center pr-5 pl-5 pt-5">
    <div>
      <img src="http://us-patienttransfer.com/wp-content/uploads/2016/10/about-us.png" class="img-fluid">
    </div>
    <div class="row p-5 justify-content-center"><button type="button" class="btn btn-primary btn-lg">Read More</button>
    </div>
  </div>
  <div class="col-md-6 col-sm-12 pr-5 pl-5 pt-5">
    <h2>WELCOME TO THE GLOBAL PATIENT TRANSFER WEBSITE</h2>
    <p>Global Patient Transfer is part of a global healthcare advisory and patient care improvement concept run by IMG Advisors LLC. We strongly believe in improving patient care services across the globe including international transfer assistance for healthcare
      needs. Global Patient Transfer and its team have many years of global healthcare experience that we have used to streamline the international patient transfer process and created services that benefit patients and their families.</p>
    <p>We offer international patients assistance to seek healthcare in the United States. We have created a smart portal that simplifies the whole process and offers case analysis as well as document uploads.</p>
    <ul>
      <li>Patients will create their personal profile</li>
      <li>Add their medical history</li>
      <li>Upload their diagnosis and reports.</li>
      <li>Our representative will analyze their information and start exchanging information with the patient and their designated family member.</li>
      <li>We will offer Information on Facilities, Treatment Plans, Logistics, Housing, and other assistance that match their needs.</li>
    </ul>
  </div>
</div>
<?php $this->load->view('common/process');?>
<?php $this->load->view('common/main-services-all');?>
<?php $this->load->view('common/map');?>
<?php $this->load->view('common/footer');?>
