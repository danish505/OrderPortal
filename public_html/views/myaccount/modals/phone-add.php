<div class="modal fade" id="contactPhoneNumberAddModal" tabindex="-1" role="dialog" aria-labelledby="contactPhoneNumberAddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactPhoneNumberAddModalLabel">Add New Phone Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('', ['id' => 'frm_patient_contact_new']); ?>
                <div class="alert alert-danger d-none" role="alert">An error occurred while processing your request. Please try again.</div>
                <input type="hidden" name="action" value="patient_contact_add" />
                <div class="form-group row">
                    <label for="salutation" class="col-sm-3 col-form-label">Salutation</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="salutation" id="salutation">
                            <?php foreach ($salutations as $salutation):?>
                            <option value="<?php echo $salutation;?>"><?php echo $salutation;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
                        <div class="invalid-feedback">
                        Please provide first name
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="middle_name" class="col-sm-3 col-form-label">Middle Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
                        <div class="invalid-feedback">
                        Please provide last name
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_contact_phone_number_add">Add Phone Number</button>
            </div>
        </div>
    </div>
</div>