<div class="row pb-2 single-address" data-id="<?php echo $address->getId();?>" id="row-address-<?php echo $address->getId();?>">
    <div class="col-8 pr-0"><?php echo $address;?></div>
    <div class="col-4">
        <div class="btn-group float-right" role="group">
            <button type="button" class="btn btn-secondary btn-sm edit" data-for="address"><i class="fa fa-fw fa-edit"></i></button>
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="address" data-target="#deletecConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
        </div>
    </div>
</div>