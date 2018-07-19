<div class="modal fade" id="contactAttachModal" tabindex="-1" role="dialog" aria-labelledby="contactAttachModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactAttachModalLabel">Attach contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(''); ?>
                <div class="alert alert-danger d-none" role="alert">An error occurred while processing your request. Please try again.</div>
                <input type="hidden" name="action" value="hospital_contact_attach" />
                <input type="hidden" name="hospital_id" />
                <input type="hidden" name="department_id" />
                <div class="form-group row">
                    <label for="contact_id" class="col-sm-3 col-form-label">contact</label>
                    <div class="col-sm-9">
                        <select name="contact_id" class="form-control"></select>
                        <div class="invalid-feedback">
                        Please provide contact name
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_hospital_contact_attach">Attach contact</button>
            </div>
        </div>
    </div>
</div>