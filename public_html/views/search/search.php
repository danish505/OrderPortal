<div class="container p-5">
  <ul class="nav nav-tabs" id="search" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="search-tab" data-toggle="tab" href="#hospitals" role="tab" aria-controls="search" aria-selected="true">Hospitals</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="service-provider-tab" data-toggle="tab" href="#service-providers" role="tab" aria-controls="service-provider" aria-selected="false">Service Providers</a>
    </li>
  </ul>
  <div class="tab-content mt-2" id="searchContent">
    <div class="tab-pane fade show active" id="hospitals" role="tabpanel" aria-labelledby="search-tab">
      <?php $this->load->view('search/search-hospital', ['hospitals' => $hospitals]);?>
    </div>
    <div class="tab-pane fade" id="service-providers" role="tabpanel" aria-labelledby="service-provider-tab">
    <?php $this->load->view('search/search-service-provider', ['serviceProviders' => $serviceProviders]);?>
    </div>
  </div>
</div>
<script type="text/javascript">
var favoriteEntities = <?php echo json_encode($favoriteEntities);?>;
</script>
<?php echo form_open(); ?>
<?php echo form_close(); ?>