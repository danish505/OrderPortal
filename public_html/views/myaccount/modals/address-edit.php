<div class="modal fade" id="contactAddressUpdateModal" tabindex="-1" role="dialog" aria-labelledby="contactAddressUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactAddressUpdateLabel">Update Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(''); ?>
                <div class="alert alert-danger d-none" role="alert">An error occurred while processing your request. Please try again.</div>
                <input type="hidden" name="action" value="patient_contact_address_update" />
                <input type="hidden" name="contact_id" />
                <input type="hidden" name="address_id" />
                <div class="form-group row">
                    <label for="street_add_1" class="col-sm-3 col-form-label">Street Address 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="street_add_1" name="street_add_1" value="" required>
                        <div class="invalid-feedback">
                        Please provide Street Address 1
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="street_add_2" class="col-sm-3 col-form-label">Street Address 2</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="street_add_2" name="street_add_2" value="">
                        <div class="invalid-feedback">
                        Please provide Street Address 2
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="street_add_3" class="col-sm-3 col-form-label">Street Address 3</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="street_add_3" name="street_add_3" value="">
                        <div class="invalid-feedback">
                        Please provide Street Address 3
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="city" name="city" value="" required>
                        <div class="invalid-feedback">
                        Please provide city
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="state" class="col-sm-3 col-form-label">State</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="state" name="state" value="" required>
                        <div class="invalid-feedback">
                        Please provide state
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="zipcode" class="col-sm-3 col-form-label">Zipcode</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="zipcode" name="zipcode" value="" required>
                        <div class="invalid-feedback">
                        Please provide zipcode
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country" class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="country" name="country">
                            <?php foreach ($countries as $country):?>
                            <option value="<?php echo $country;?>"><?php echo $country;?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback">
                        Please provide country
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_contact_address_update">Update Address</button>
            </div>
        </div>
    </div>
</div>