<div class="col-12 col-sm-6 col-md-4">
    <div class="card mt-2">
        <div class="card-header"><span class="h4"><?php echo $hospital->getHospitalName();?></span></div>
        <div class="card-body address-list">
            <?php echo $hospital->getHospitalName();?><br />
            <a href="<?php $hospital->getHospitalUrl();?>" target="_blank"><?php $hospital->getHospitalUrl();?></a>
            <?php if ($isUserLoggedIn): ?>
            <i class="fa fa-heart-o text-danger float-right icon-favorite" data-type="hospital" data-id="<?php echo $hospital->getId();?>"></i>
            <?php endif; ?>
        </div>
    </div>
</div>