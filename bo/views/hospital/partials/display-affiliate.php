<div class="row pb-2 single-affiliate" data-id="<?php echo $affiliate->getId();?>" id="row-affiliate-<?php echo $affiliate->getId();?>">
    <div class="col-8 pr-0"><?php echo $affiliate->getHospitalName();?></div>
    <div class="col-4">
        <div class="btn-group float-right" role="group">
        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="affiliate" data-target="#deleteConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
        </div>
    </div>
</div>