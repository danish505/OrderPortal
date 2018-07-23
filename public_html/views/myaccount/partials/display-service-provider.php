<div class="col-12 col-sm-6 col-md-4">
    <div class="card mt-2">
        <div class="card-header"><span class="h4"><?php echo $serviceProvider->getCompanyName();?></span></div>
        <div class="card-body">
            <?php echo $serviceProvider->getCompanyName();?><br />
            <a href="<?php $serviceProvider->getCompanyUrl();?>" target="_blank"><?php $serviceProvider->getCompanyUrl();?></a>
            <i class="fa fa-heart text-danger float-right icon-favorite" data-type="service_provider" data-id="<?php echo $serviceProvider->getId();?>"></i>
        </div>
    </div>
</div>