<div class="row pb-2 single-phone" data-id="<?php echo $phone_number->getId();?>" id="row-phone-<?php echo $phone_number->getId();?>">
    <div class="col-8 pr-0"><?php echo $phone_number;?></div>
    <div class="col-4">
        <div class="btn-group float-right" role="group">
            <button type="button" class="btn btn-secondary btn-sm edit" data-for="phone"><i class="fa fa-fw fa-edit"></i></button>
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="phone" data-target="#deleteConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
        </div>
    </div>
</div>