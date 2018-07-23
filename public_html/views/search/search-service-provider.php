<div class="row">
<?php 
    if($serviceProviders && count($serviceProviders)){
        foreach($serviceProviders as $serviceProvider) {
            $this->load->view('search/partials/display-service-provider', ['serviceProvider' => $serviceProvider]);
        }
    } else {
        ?>
    <div class="col-12 col-sm-6 col-md-4">
        No Result found.
    </div>
<?php } ?>
</div>