<li class="list-group-item">
    <div class="row pr-3">
        <div class="col-10 mt-2"><h4>Mr. Shahzad Fateh Ali</h4></div>
        <div class="col-2 pr-0">
            <div class="btn-group pt-1 float-right" role="group">
                <button type="button" class="btn btn-secondary" data-toggle="collapse" href="#contactDetail"><i class="fa fa-fw fa-eye"></i></button>
                <button type="button" class="btn btn-secondary"><i class="fa fa-fw fa-edit"></i></button>
                <button type="button" class="btn btn-secondary"><i class="fa fa-fw fa-trash"></i></button>
            </div>
        </div>
    </div>
    <div class="collapse" id="contactDetail">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Addresses</span>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#contactAddressAddModal">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <?php $this->load->view('myaccount/partials/display-address');?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Email Addresses</span>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#contactEmailAddressAddModal">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <?php $this->load->view('myaccount/partials/display-email');?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card mt-2">
                    <div class="card-header"><span class="h4">Phone Numbers</span>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#contactPhoneNumberAddModal">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <?php $this->load->view('myaccount/partials/display-phone');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>