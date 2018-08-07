<li class="list-group-item single-hospital" data-id="<?php echo $hospital->getId();?>" id="row-hospital-<?php echo $hospital->getId();?>">
    <div class="row pr-3">
        <div class="col-10 mt-2">
        <h4><?php echo $hospital->getHospitalName();?>
        <?php if($hospital->getInContract() == '1'):?>
        <i class="fa fa-fw fa-check-circle text-success"></i>
        <?php endif; ?>
        </h4>
        </div>
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
            <div class="col-12 col-sm-12 col-md-12">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Affiliates</span>
                        <button class="btn btn-primary btn-sm float-right edit" data-for="affiliates">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body affiliates-list">
                        <?php 
                        $affiliates = $hospital->getAffiliates();
                        $class='';
                        if($affiliates && count($affiliates)){
                            $class='d-none';
                            foreach($affiliates as $affiliate){
                                $this->load->view('hospital/partials/display-affiliate',['affiliate'=>$affiliate]);
                            }
                        }
                        ?>
                        <div class="not-found <?php echo $class;?>">No affiliated hospital found. Click "+" above to attach.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Departments</span>
                        <button class="btn btn-primary btn-sm float-right edit" data-for="departments">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <ul class="list-group mt-2 departments-list list-group-flush">
                        <?php 
                        $departments = $hospital->getDepartments();
                        $class='';
                        if($departments && count($departments)){
                            $class='d-none';
                            foreach($departments as $department) {
                                $this->load->view('hospital/partials/display-department', ['department' => $department, 'hospital' => $hospital]);
                            }
                        }
                        ?>
                        <li class="list-group-item not-found <?php echo $class;?>">No hospital found. Click "+" above to add.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</li>