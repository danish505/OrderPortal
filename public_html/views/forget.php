<div class="container">

<div class="card card-login mx-auto mt-5 mb-5" style="width: 20rem">
<div class="card-header">Forget Password</div>
<?= form_open('Forgetpwd_Controller/verify_user'); ?>
      <div class="card-body">
<div class="form-group">
<label for="email">Email</label>
<input class="form-control" name="email" id="email" type="text" aria-describedby="usernnameHelp" placeholder="Enter username">

</div>
<div class="form-group text-center">
	<input type="submit" class="btn btn-primary"/>
</div>
</div>
<?= form_close()?>
</div>
</div>
