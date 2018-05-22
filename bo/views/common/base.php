<?php $this->load->view($header); ?>
<?php $this->load->view($nav); ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <?php $this->load->view($currentPage, $currentPageData);?>
  </div>
  <?php $this->load->view($copyright);?>
</div>
<?php $this->load->view($footer);?>
