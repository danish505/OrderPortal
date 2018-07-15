<tr id="service_provider_<?php echo $serviceProvider->getId();?>" data-id="<?php echo $serviceProvider->getId();?>">
    <td><?php echo $serviceProvider->getCompanyName();?></td>
    <td><?php echo $serviceProvider->getCompanyType();?></td>
    <td><?php echo $serviceProvider->getCompanyUrl();?></td>
    <td>
      <a class="btn btn-secondary btn-sm view" href="/service-providers/<?php echo $serviceProvider->getId();?>"><i class="fa fa-fw fa-eye"></i></a>
      <button type="button" class="btn btn-secondary btn-sm edit" data-for="service_provider"><i class="fa fa-fw fa-edit"></i></button>
      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="service_provider" data-target="#deletecConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
    </td>
  </tr>