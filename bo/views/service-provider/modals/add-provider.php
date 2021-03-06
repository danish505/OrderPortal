<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add New Service Provider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(''); ?>
                <div class="alert alert-danger d-none" role="alert">An error occurred while processing your request. Please try again.</div>
                <input type="hidden" name="action" value="service_provider_add" />
                <div class="form-group row">
                    <label for="company_name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_name" name="company_name" value="" required>
                        <div class="invalid-feedback">
                        Please provide service provider name
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_type" class="col-sm-3 col-form-label">Type</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_type" name="company_type" value="" required>
                        <div class="invalid-feedback">
                        Please provide provider type
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_url" class="col-sm-3 col-form-label">URL</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="company_url" name="company_url" placeholder="https://example.com" value="" required>
                        <div class="invalid-feedback">
                        Please provide website url
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_service_provider_add">Add Service Provider</button>
            </div>
        </div>
    </div>
</div>