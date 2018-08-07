<div class="modal fade" id="hospitalUpdateModal" tabindex="-1" role="dialog" aria-labelledby="hospitalUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hospitalUpdateModalLabel">Update hospital</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(''); ?>
                <div class="alert alert-danger d-none" role="alert">An error occurred while processing your request. Please try again.</div>
                <input type="hidden" name="action" value="hospital_update" />
                <input type="hidden" name="hospital_id" />
                <div class="form-group row">
                    <label for="hospital_name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="hospital_name" name="hospital_name" value="" required>
                        <div class="invalid-feedback">
                        Please provide hospital name
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hospital_type" class="col-sm-3 col-form-label">Type</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="hospital_type" name="hospital_type" value="" required>
                        <div class="invalid-feedback">
                        Please provide hospital type
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hospital_url" class="col-sm-3 col-form-label">URL</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="hospital_url" name="hospital_url" placeholder="https://example.com" value="" required>
                        <div class="invalid-feedback">
                        Please provide website url
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hospital_url" class="col-sm-3 col-form-label">In Contract</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="in_contract" name="in_contract">
                        <option value="0" selected>No</option>
                        <option value="1">Yes</option>
                    </select>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_hospital_update">Update Hospital</button>
            </div>
        </div>
    </div>
</div>