<tr id="department_<?php echo $department->getId();?>" data-id="<?php echo $department->getId();?>">
    <td><?php echo $department->getDepartmentName();?></td>
    <td>
      <button type="button" class="btn btn-secondary btn-sm edit" data-for="department"><i class="fa fa-fw fa-edit"></i></button>
      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-for="department" data-target="#deleteConfirmationModal"><i class="fa fa-fw fa-trash"></i></button>
    </td>
  </tr>