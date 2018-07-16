<li class="list-group-item single-hospital" data-id="<?php echo $hospital->getId();?>" id="row-hospital-<?php echo $hospital->getId();?>">
    <div class="row pr-3">
        <div class="col-10 mt-2"><h4><?php echo $hospital->getHospitalName();?></h4></div>
        <div class="col-2 pr-0">
            <div class="btn-group pt-1 float-right" role="group">
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" href="#hospitalDetail<?php echo $hospital->getId();?>"><i class="fa fa-fw fa-eye"></i></button>
                <button type="button" class="btn btn-secondary btn-sm edit" data-for="hospital"><i class="fa fa-fw fa-edit"></i></button>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="hospital" data-target="#deleteConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
            </div>
        </div>
    </div>
    <div class="collapse" id="hospitalDetail<?php echo $hospital->getId();?>">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Affiliates</span>
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#hospitalAddressAddModal">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body address-list">
                        <?php 
                        $class='';
                        /*$addresses = $hospital->getAddresses();
                        $class='';
                        if($addresses && count($addresses)){
                            $class='d-none';
                            foreach($addresses as $address){
                                $this->load->view('service-provider/hospital/partials/display-address',['address'=>$address]);
                            }
                        }*/
                        ?>
                        <div class="not-found <?php echo $class;?>">No address found. Click "+" above to add.</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Services</span>
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#hospitalEmailAddressAddModal">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body emails-list">
                    <?php 
                    $class='';
                        /*$emails = $hospital->getEmails();
                        $class='';
                        if($emails && count($emails)){
                            $class='d-none';
                            foreach($emails as $email){
                                $this->load->view('service-provider/hospital/partials/display-email',['email'=>$email]);
                            }
                        }*/
                        ?>
                        <div class="not-found <?php echo $class;?>">No email found. Click "+" above to add.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Departments</span>
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#hospitalAddressAddModal">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body address-list">
                        <?php 
                        $class='';
                        /*$addresses = $hospital->getAddresses();
                        $class='';
                        if($addresses && count($addresses)){
                            $class='d-none';
                            foreach($addresses as $address){
                                $this->load->view('service-provider/hospital/partials/display-address',['address'=>$address]);
                            }
                        }*/
                        ?>
                        <div class="not-found <?php echo $class;?>">No address found. Click "+" above to add.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>