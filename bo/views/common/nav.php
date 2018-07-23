<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.html"><?php echo $site_title;?></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Hospitals">
        <a class="nav-link" href="<?php echo $base_url;?>hospitals">
          <i class="fa fa-fw fa-hospital-o"></i>
          <span class="nav-link-text">Hospitals</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contacts">
        <a class="nav-link" href="<?php echo $base_url;?>contacts">
          <i class="fa fa-fw fa-user"></i>
          <span class="nav-link-text">Contacts</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Service Providers">
        <a class="nav-link" href="<?php echo $base_url;?>service-providers">
          <i class="fa fa-fw fa-handshake-o"></i>
          <span class="nav-link-text">Service Providers</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patients">
        <a class="nav-link" href="<?php echo $base_url;?>patients">
          <i class="fa fa-fw fa-wheelchair"></i>
          <span class="nav-link-text">Patients</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Services">
        <a class="nav-link" href="<?php echo $base_url;?>services">
          <i class="fa fa-fw fa-briefcase"></i>
          <span class="nav-link-text">Services</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Departments">
        <a class="nav-link" href="<?php echo $base_url;?>departments">
          <i class="fa fa-fw fa-group"></i>
          <span class="nav-link-text">Departments</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Searches">
        <a class="nav-link" href="<?php echo $base_url;?>searches">
          <i class="fa fa-fw fa-search"></i>
          <span class="nav-link-text">Searches</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $base_url;?>/logout">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
