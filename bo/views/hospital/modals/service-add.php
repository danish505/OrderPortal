<div class="modal fade" id="serviceAttachModal" tabindex="-1" role="dialog" aria-labelledby="serviceAttachModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceAttachModalLabel">Attach Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(''); ?>
                <div class="alert alert-danger d-none" role="alert">An error occurred while processing your request. Please try again.</div>
                <input type="hidden" name="action" value="hospital_service_attach" />
                <input type="hidden" name="hospital_id" />
                <div class="form-group row">
                    <label for="service_id" class="col-sm-3 col-form-label">Service</label>
                    <div class="col-sm-9">
                        <select name="service_id" class="form-control"></select>
                        <div class="invalid-feedback">
                        Please provide service provider name
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_hospital_service_attach">Attach Service</button>
            </div>
        </div>
    </div>
</div>