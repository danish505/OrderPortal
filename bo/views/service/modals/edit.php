<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Update Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(''); ?>
                <div class="alert alert-danger d-none" role="alert">An error occurred while processing your request. Please try again.</div>
                <input type="hidden" name="action" value="service_update" />
                <input type="hidden" name="service_id" />
                <div class="form-group row">
                    <label for="service_name" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="service_name" name="service_name" value="" required>
                        <div class="invalid-feedback">Service Name is required.</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="service_category" class="col-sm-4 col-form-label">Category</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="service_category" name="service_category" value="" required>
                        <div class="invalid-feedback">Service category is required.</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="service_sub_category" class="col-sm-4 col-form-label">Sub category</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="service_sub_category" name="service_sub_category" value="">
                        <!--div class="invalid-feedback">Service sub category is required.</div-->
                    </div>
                </div><?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_service_update">Update Service</button>
            </div>
        </div>
    </div>
</div>