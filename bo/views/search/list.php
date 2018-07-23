<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-search"></i> Search Keywords</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 75%">Keyword</th>
            <th>Count</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($searches as $search):?>
          <tr>
            <td><?php echo $search['keyword'];?></td>
            <td><?php echo $search['total'];?></td>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>
