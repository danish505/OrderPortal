<div class="row">
<?php 
    $favorites = $user_detail->getFavorites();
    if($favorites && count($favorites)){
        foreach($favorites as $favorite) {
            if($favorite->getType() == 'hospital'){
                $hospital = $this->doctrine->em->find('GptHospital', $favorite->getReferenceId());
                $this->load->view('myaccount/partials/display-hospital', ['hospital' => $hospital]);
            }else if($favorite->getType() == 'service_provider'){
                $serviceProvider = $this->doctrine->em->find('GptCompany', $favorite->getReferenceId());
                $this->load->view('myaccount/partials/display-service-provider', ['serviceProvider' => $serviceProvider]);
            }
        }
    } else {
?>
    <div class="col-12 col-sm-6 col-md-4">
        You do not have any hospital / provider saved.
    </div>
<?php } ?>
</div>