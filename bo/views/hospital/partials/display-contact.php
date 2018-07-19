<div class="row pb-2 single-contact" data-contact-id="<?php echo $contact->getContact()->getId();?>" data-id="<?php echo $contact->getId();?>" id="row-contact-<?php echo $contact->getId();?>">
    <div class="col-8 pr-0"><?php echo $contact->getContact()->getDisplayName();?></div>
    <div class="col-4">
        <div class="btn-group float-right" role="group">
        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="contact" data-target="#deleteConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
        </div>
    </div>
</div>