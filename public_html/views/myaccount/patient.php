<div class="container">
  <div class="card card-login mx-auto mt-5 mb-5">
    <div class="card-header"><?php echo $user_detail->getDisplayName();?></div>
    <div class="card-body">
      <ul class="nav nav-tabs" id="myaccount" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="false">Contacts</a>
        </li>
      </ul>
      <div class="tab-content mt-2" id="myaccountContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <?php $this->load->view('myaccount/patient-profile');?>
        </div>
        <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <?php $this->load->view('myaccount/patient-contacts');?>
        </div>
      </div>
    </div>
  </div>
</div>