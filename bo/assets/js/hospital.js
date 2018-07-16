$(document).ready(function(){
    var prefix = 'hospitalDetail';
    var handler = {
        handle: function(response, _cb){
            if(response.success){
                _cb(response);
            } else {
                console.log(response.message);
            }
        },
        callback_hospital_add: function(response, hospital_id) {
            handler.handle(response, function(r){
                let list = $('ul.hospitals-list');
                list.append(r.html);
                list.find('li.not-found').addClass('d-none');
            });
        },
        callback_hospital_update: function(response, hospital_id) {
            handler.handle(response, function(r){
                let list = $('ul.hospitals-list').find('li#row-hospital-'+hospital_id);
                list.replaceWith(r.html);
            });
        },
        callback_hospital_email_address_add: function(response, hospital_id) {
            handler.handle(response, function(r){
                let list = $('div.collapse#'+prefix+hospital_id).find('div.emails-list');
                list.append(r.html);
                list.find('div.not-found').addClass('d-none');
            });
        },
        callback_hospital_email_address_update: function(response, hospital_id) {
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('div.collapse#'+prefix+hospital_id).find('div.emails-list').find('#row-email-'+id);
                div.replaceWith(r.html);
            });
        },
        callback_hospital_address_add: function(response, hospital_id) {
            handler.handle(response, function(r){
                let list = $('div.collapse#'+prefix+hospital_id).find('div.address-list');
                list.append(r.html);
                list.find('div.not-found').addClass('d-none');
            });
        },
        callback_hospital_phone_number_add: function(response, hospital_id) {
            handler.handle(response, function(r){
                let list = $('div.collapse#'+prefix+hospital_id).find('div.phones-list');
                list.append(r.html);
                list.find('div.not-found').addClass('d-none');
            });
        },
        callback_hospital_phone_number_update: function(response, hospital_id) {
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('div.collapse#'+prefix+hospital_id).find('div.phones-list').find('#row-phone-'+id);
                div.replaceWith(r.html);
            });
        },
        callback_hospital_address_update: function(response, hospital_id) {
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('div.collapse#'+prefix+hospital_id).find('div.address-list').find('#row-address-'+id);
                div.replaceWith(r.html);
            });
        },
        callback_delete_email: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('div.single-email').length == 0){
                    $parent.find('div.not-found').removeClass('d-none');
                }
            });
        },
        callback_delete_address: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('div.single-address').length == 0){
                    $parent.find('div.not-found').removeClass('d-none');
                }
            });
        },
        callback_delete_phone: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('div.single-phone').length == 0){
                    $parent.find('div.not-found').removeClass('d-none');
                }
            });
        },
        callback_delete_hospital: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('li.single-hospital').length == 0){
                    $parent.find('li.not-found').removeClass('d-none');
                }
            });
        },
        delete_email: function(modal, $el, hospital_id) {
            let email_id = $el.data('id');
            let token = $('input[name="csrf_token"]').eq(0).val();

            make_call(
                '/hospitals/ajax',
                $.param([{name:'email_id', value: email_id}, {name:'hospital_id', value: hospital_id}, {name: "action", value: "hospital_email_delete"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_email'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        delete_address: function(modal, $el, hospital_id) {
            let address_id = $el.data('id');
            let token = $('input[name="csrf_token"]').eq(0).val();

            make_call(
                '/hospitals/ajax',
                $.param([{name:'address_id', value: address_id}, {name:'hospital_id', value: hospital_id}, {name: "action", value: "hospital_address_delete"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_address'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        delete_phone: function(modal, $el, hospital_id) {
            let phone_id = $el.data('id');
            let token = $('input[name="csrf_token"]').eq(0).val();

            make_call(
                '/hospitals/ajax',
                $.param([{name:'phone_id', value: phone_id}, {name:'hospital_id', value: hospital_id}, {name: "action", value: "hospital_phone_delete"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_phone'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        delete_hospital: function(modal, $el, hospital_id){
            let token = $('input[name="csrf_token"]').eq(0).val();
            make_call(
                '/hospitals/ajax',
                $.param([{name:'hospital_id', value: hospital_id}, {name: "action", value: "hospital_delete"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_hospital'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        submit_form: function(modal, callback) {
            var form = modal.find('form');
            var hospital_id = form.find('input[name="hospital_id"]').val();
            if (form[0].checkValidity() === false) {
                display_errors(form[0]);
            } else {
                make_call(
                    '/hospitals/ajax',
                    $.param(form.serializeArray()),
                    function(response){
                        if(!!handler[callback]){
                            handler[callback](response, hospital_id);
                        }
                        callback_after_success(response, modal);
                    },
                    function(response){
                        callback_fail(response, modal);
                    }
                )
            }
        },
        prepare_hospital: function(data){
            let modal = $('div.modal#hospitalUpdateModal');
            modal.find('input[name="hospital_id"]').val(data.hospital_id);
            modal.find('input[name="hospital_name"]').val(data.hospital_name);
            modal.find('input[name="hospital_type"]').val(data.hospital_type);
            modal.find('input[name="hospital_url"]').val(data.hospital_url);
            modal.modal('show');
        },
        prepare_email: function(data){
            let modal = $('div.modal#hospitalEmailAddressUpdateModal');
            modal.find('input[name="hospital_id"]').val(data.hospital_id);
            modal.find('input[name="email_id"]').val(data.email_id);
            modal.find('input[name="email_address"]').val(data.email);
            modal.modal('show');
        },
        prepare_phone: function(data){
            let modal = $('div.modal#hospitalPhoneNumberUpdateModal');
            modal.find('input[name="hospital_id"]').val(data.hospital_id);
            modal.find('input[name="phone_id"]').val(data.phone_id);
            modal.find('input[name="ctry_cd"]').val(data.ctry_code);
            modal.find('input[name="area_cd"]').val(data.area_code);
            modal.find('input[name="phone_no"]').val(data.phone_no);
            modal.find('input[name="ext"]').val(data.extension);
            modal.modal('show');
        },
        prepare_address: function(data){
            let modal = $('div.modal#hospitalAddressUpdateModal');
            modal.find('input[name="hospital_id"]').val(data.hospital_id);
            modal.find('input[name="address_id"]').val(data.id);
            modal.find('input[name="street_add_1"]').val(data.street_addr_1);
            modal.find('input[name="street_add_2"]').val(data.street_addr_2);
            modal.find('input[name="street_add_3"]').val(data.street_addr_3);
            modal.find('input[name="city"]').val(data.city);
            modal.find('input[name="state"]').val(data.state);
            modal.find('input[name="zipcode"]').val(data.zipcode);
            modal.find('input[name="country"]').val(data.country);
            modal.modal('show');
        },
    }
    
    $('div.modal:not(#deleteConfirmationModal)').on('hidden.bs.modal', function (e) {
        let form = $(this).find('form')[0];
        form.reset();
        form.classList.remove('was-validated');
        $(this).find('.alert.alert-danger').addClass('d-none');
    }).on('show.bs.modal', function(e){
        let $collapse = $(e.relatedTarget).closest('div.collapse');
        if(!!$collapse && $collapse.length > 0){
            let hospital_id = $collapse[0].id.replace(prefix,'');
            $(this).find('form').find('input[name="hospital_id"]').val(hospital_id);
        }
    }).find('button.btn-primary').click(function(){
        let callback = this.id.replace('btn','callback');
        let modal = $(this).closest('div.modal');
        handler.submit_form(modal, callback);
    });

    $('div.modal#deleteConfirmationModal').on('show.bs.modal', function(e){
        let hospital_id = $(e.relatedTarget).closest('li.list-group-item.single-hospital').find('div.collapse')[0].id.replace(prefix,'');
        let action_for = $(e.relatedTarget).data('for');
        let action = 'delete_'+action_for;
        let modal = $(this);
        modal.find('.alert.alert-danger').addClass('d-none');
        $(this).find('button.btn-primary').bind('click', function(){
            if(!!handler[action]){
                handler[action](modal, $(e.relatedTarget).closest('.single-'+action_for), hospital_id);
                modal.modal('hide');
            }
        });
    }).on('hidden.bs.modal', function (e) {
        $(this).find('button.btn-primary').unbind();
    })

    function display_errors(form) {
        form.classList.add('was-validated');
    }

    function callback_delete_fail(response, modal) {
        modal.find('.alert.alert-danger.d-none').removeClass('d-none');
    }
    function callback_fail(response, modal) {
            modal.find('.alert.alert-danger.d-none').removeClass('d-none');
    }

    function callback_after_success(response, modal) {
        modal.modal('hide');
    }
    
    function make_call(endpoint, data, success, failure) {
        $.post(
            endpoint,
            data,
            success
        ).fail(failure);
    }

    $('body').on('click','button.edit', function(){
        let action_for = $(this).data('for');
        let id = $(this).closest('.single-'+action_for).data('id');

        $.get(`/hospitals/json/${action_for}/${id}`, null, function(response){
            let prepare_function = 'prepare_'+action_for;
            if(response.success && !!handler[prepare_function]){
                handler[prepare_function](response.html);
            } else {
                console.log("Unable to process request");
            }
        })
    })
});