<li class="list-group-item single-contact" data-id="<?php echo $contact->getId();?>" id="row-contact-<?php echo $contact->getId();?>">
    <div class="row pr-3">
        <div class="col-10 mt-2"><h4><?php echo $contact->getDisplayName();?></h4></div>
        <div class="col-2 pr-0">
            <div class="btn-group pt-1 float-right" role="group">
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" href="#contactDetail<?php echo $contact->getId();?>"><i class="fa fa-fw fa-eye"></i></button>
                <button type="button" class="btn btn-secondary btn-sm edit" data-for="contact"><i class="fa fa-fw fa-edit"></i></button>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="contact" data-target="#deletecConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
            </div>
        </div>
    </div>
    <div class="collapse" id="contactDetail<?php echo $contact->getId();?>">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Addresses</span>
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#contactAddressAddModal">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body address-list">
                        <?php 
                        $addresses = $contact->getAddresses();
                        $class='';
                        if($addresses && count($addresses)){
                            $class='d-none';
                            foreach($addresses as $address){
                                $this->load->view('myaccount/partials/display-address',['address'=>$address]);
                            }
                        }
                        ?>
                        <div class="not-found <?php echo $class;?>">No address found. Click "+" above to add.</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Email Addresses</span>
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#contactEmailAddressAddModal">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body emails-list">
                    <?php 
                        $emails = $contact->getEmails();
                        $class='';
                        if($emails && count($emails)){
                            $class='d-none';
                            foreach($emails as $email){
                                $this->load->view('myaccount/partials/display-email',['email'=>$email]);
                            }
                        }
                        ?>
                        <div class="not-found <?php echo $class;?>">No email found. Click "+" above to add.</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Phone Numbers</span>
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#contactPhoneNumberAddModal">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body phones-list">
                    <?php 
                        $phone_numbers = $contact->getPhoneNumbers();
                        $class='';
                        if($phone_numbers && count($phone_numbers)){
                            foreach($phone_numbers as $phone_number){
                                $class='d-none';
                                $this->load->view('myaccount/partials/display-phone',['phone_number'=>$phone_number]);
                            }
                        }
                        ?>
                        <div class="not-found <?php echo $class;?>">No number found. Click "+" above to add.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>