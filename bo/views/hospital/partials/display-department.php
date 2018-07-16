<li class="list-group-item single-department" data-id="<?php echo $department->getId();?>" id="row-department-<?php echo $department->getId();?>">
    <div class="row pr-3">
        <div class="col-10 mt-2"><h4><?php echo $department->getDepartmentName();?></h4></div>
        <div class="col-2 pr-0">
            <div class="btn-group pt-1 float-right" role="group">
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" href="#departmentDetail<?php echo $department->getId();?>"><i class="fa fa-fw fa-eye"></i></button>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="department" data-target="#deleteConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
            </div>
        </div>
    </div>
    <div class="collapse" id="departmentDetail<?php echo $department->getId();?>">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Contacts</span>
                        <button class="btn btn-primary btn-sm float-right edit" data-for="affiliates">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body affiliates-list">
                        <?php 
                        $class='';
                        /*$addresses = $department->getAddresses();
                        $class='';
                        if($addresses && count($addresses)){
                            $class='d-none';
                            foreach($addresses as $address){
                                $this->load->view('service-provider/department/partials/display-address',['address'=>$address]);
                            }
                        }*/
                        ?>
                        <div class="not-found <?php echo $class;?>">No affiliated department found. Click "+" above to attach.</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Services</span>
                        <button class="btn btn-primary btn-sm float-right edit" data-for="services">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body services-list">
                    <?php 
                    $class='';
                        /*$emails = $department->getEmails();
                        $class='';
                        if($emails && count($emails)){
                            $class='d-none';
                            foreach($emails as $email){
                                $this->load->view('service-provider/department/partials/display-email',['email'=>$email]);
                            }
                        }*/
                        ?>
                        <div class="not-found <?php echo $class;?>">No service found. Click "+" above to attach.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>