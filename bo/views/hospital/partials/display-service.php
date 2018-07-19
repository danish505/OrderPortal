<div class="row pb-2 single-service" data-service-id="<?php echo $service->getservice()->getId();?>" data-id="<?php echo $service->getId();?>" id="row-service-<?php echo $service->getId();?>">
    <div class="col-8 pr-0"><?php echo $service->getService()->getServiceName();?></div>
    <div class="col-4">
        <div class="btn-group float-right" role="group">
        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="service" data-target="#deleteConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
        </div>
    </div>
</div>