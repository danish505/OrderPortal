<tr id="service_<?php echo $service->getId();?>" data-id="<?php echo $service->getId();?>">
    <td><?php echo $service->getServiceName();?></td>
    <td><?php echo $service->getCategory();?></td>
    <td><?php echo $service->getSubCategory();?></td>
    <td>
      <button type="button" class="btn btn-secondary btn-sm edit" data-for="service"><i class="fa fa-fw fa-edit"></i></button>
      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="service" data-target="#deleteConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
    </td>
  </tr>