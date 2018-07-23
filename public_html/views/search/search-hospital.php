<div class="row">
<?php 
    if($hospitals && count($hospitals)){
        foreach($hospitals as $hospital) {
            $this->load->view('search/partials/display-hospital', ['hospital' => $hospital]);
        }
    } else {
        ?>
    <div class="col-12 col-sm-6 col-md-4">
        No Result found.
    </div>
<?php } ?>
</div>