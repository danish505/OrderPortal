<?php 
$composite_id = $department->getId().$hospital->getId(); 
?>
<li class="list-group-item single-department" data-id="<?php echo $department->getId();?>" id="row-department-<?php echo $department->getId();?>">
    <div class="row pr-3">
        <div class="col-10 mt-2"><h4><?php echo $department->getDepartmentName();?></h4></div>
        <div class="col-2 pr-0">
            <div class="btn-group pt-1 float-right" role="group">
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" href="#departmentDetail<?php echo $composite_id;?>"><i class="fa fa-fw fa-eye"></i></button>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="department" data-target="#deleteConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
            </div>
        </div>
    </div>
    <div class="collapse" id="departmentDetail<?php echo $composite_id;?>">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Contacts</span>
                        <button class="btn btn-primary btn-sm float-right edit" data-for="contacts">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body contacts-list">
                        <?php 
                        $class='';
                        $query = $this->doctrine->em->createQueryBuilder()
                                 ->select('c')
                                 ->from('GptHospitalContXref', 'c')
                                 ->join('c.hospital', 'h', 'WITH', 'h.hospitalId = ?1')
                                 ->join('c.hospitalDept', 'd', 'WITH', 'd.hospitalDeptId = ?2')
                                 ->setParameter(1, $hospital->getId())
                                 ->setParameter(2, $department->getId())
                                 ->getQuery();
                        $contacts = $query->getResult();
                        if($contacts && count($contacts)){
                            $class='d-none';
                             foreach($contacts as $contact){
                                $this->load->view('hospital/partials/display-contact',['contact'=>$contact]);
                            }
                        }
                        ?>
                        <div class="not-found <?php echo $class;?>">No department contact found. Click "+" above to attach.</div>
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
                    $query = $this->doctrine->em->createQueryBuilder()
                                 ->select('c')
                                 ->from('GptHospitalServiceXref', 'c')
                                 ->join('c.hospital', 'h', 'WITH', 'h.hospitalId = ?1')
                                 ->join('c.department', 's', 'WITH', 's.hospitalDeptId = ?2')
                                 ->setParameter(1, $hospital->getId())
                                 ->setParameter(2, $department->getId())
                                 ->getQuery();
                        $services = $query->getResult();
                        if($services && count($services)){
                            $class='d-none';
                             foreach($services as $service){
                                $this->load->view('hospital/partials/display-service',['service'=>$service]);
                            }
                        }
                        ?>
                        <div class="not-found <?php echo $class;?>">No service found. Click "+" above to attach.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>