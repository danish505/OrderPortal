<div class="row pb-2 single-email" data-id="<?php echo $email->getId();?>">
    <div class="col-8 pr-0"><?php echo $email;?></div>
    <div class="col-4">
        <div class="btn-group float-right" role="group">
            <button type="button" class="btn btn-secondary btn-sm edit" data-for="email"><i class="fa fa-fw fa-edit"></i></button>
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#deletecConfirmationModal" data-for="email"><i class="fa fa-fw fa-trash"></i></button>
        </div>
    </div>
</div>