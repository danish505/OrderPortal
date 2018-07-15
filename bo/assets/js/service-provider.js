$(document).ready(function(){
    var prefix = 'service_provider_';
    var handler = {
        handle: function(response, _cb){
            if(response.success){
                _cb(response);
            } else {
                console.log(response.message);
            }
        },
        callback_service_provider_add: function(response) {
            handler.handle(response, function(r){
                let list = $('table > tbody');
                list.append(r.html);
                list.find('tr.not-found').addClass('d-none');
            });
        },
        callback_service_provider_service_add: function(response){
            handler.handle(response, function(r){
                let list = $('table#serviceDataTable > tbody');
                list.append(r.html);
                list.find('tr.not-found').addClass('d-none');
            });
        },
        callback_service_provider_contact_add: function(response) {
            let list = $('ul.service-provider-contacts-list');
                list.append(response.html);
                list.find('li.not-found').addClass('d-none');
        },
        callback_contact_email_address_add: function(response, contact_id) {
            handler.handle(response, function(r){
                let list = $('div.collapse#contactDetail'+contact_id).find('div.emails-list');
                list.append(r.html);
                list.find('div.not-found').addClass('d-none');
            });
        },
        callback_contact_email_address_update: function(response, contact_id) {
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('div.collapse#contactDetail'+contact_id).find('div.emails-list').find('#row-email-'+id);
                div.replaceWith(r.html);
            });
        },
        callback_contact_address_add: function(response, contact_id) {
            handler.handle(response, function(r){
                let list = $('div.collapse#contactDetail'+contact_id).find('div.address-list');
                list.append(r.html);
                list.find('div.not-found').addClass('d-none');
            });
        },
        callback_contact_phone_number_add: function(response, contact_id) {
            handler.handle(response, function(r){
                let list = $('div.collapse#contactDetail'+contact_id).find('div.phones-list');
                list.append(r.html);
                list.find('div.not-found').addClass('d-none');
            });
        },
        callback_contact_phone_number_update: function(response, contact_id) {
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('div.collapse#contactDetail'+contact_id).find('div.phones-list').find('#row-phone-'+id);
                div.replaceWith(r.html);
            });
        },
        callback_contact_address_update: function(response, contact_id) {
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('div.collapse#contactDetail'+contact_id).find('div.address-list').find('#row-address-'+id);
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
        callback_service_provider_contact_update: function(response){
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('ul.service-provider-contacts-list').find('li#row-contact-'+id);
                div.replaceWith(r.html);
            });
        },
        callback_service_provider_update: function(response, service_provider_id) {
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('tr#'+prefix+service_provider_id);
                div.replaceWith(r.html);
            });
        },
        callback_service_provider_service_update: function(response){
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('table#serviceDataTable > tbody').find('tr#service_'+id);
                div.replaceWith(r.html);
            });
        },
        callback_delete_service_provider: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('tr:not(.not-found)').length == 0){
                    $parent.find('tr.not-found').removeClass('d-none');
                }
            });
        },
        delete_service_provider: function(modal, $el, service_provider_id){
            let token = $('input[name="csrf_token"]').eq(0).val();
            make_call(
                '/service-providers/ajax',
                $.param([{name:'id', value: service_provider_id}, {name: "action", value: "service_provider_delete"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_service_provider'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        callback_delete_contact: function(response, $el) {
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('li:not(.not-found)').length == 0){
                    $parent.find('li.not-found').removeClass('d-none');
                }
            });
        },
        delete_contact: function(modal, $el, contact_id){
            let token = $('input[name="csrf_token"]').eq(0).val();
            make_call(
                '/service-providers/ajax',
                $.param([{name:'id', value: contact_id}, {name: "action", value: "service_provider_contact_delete"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_contact'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        submit_form: function(modal, callback) {
            console.log(callback);
            var form = modal.find('form');
            var id = form.find('input[name="service_provider_id"]').val();
            if(!id){
                id = form.find('input[name="contact_id"]').val();
            }
            if (form[0].checkValidity() === false) {
                display_errors(form[0]);
            } else {
                make_call(
                    '/service-providers/ajax',
                    $.param(form.serializeArray()),
                    function(response){
                        if(!!handler[callback]){
                            handler[callback](response, id);
                        }
                        callback_after_success(response, modal);
                    },
                    function(response){
                        callback_fail(response, modal);
                    }
                )
            }
        },
        prepare_service_provider: function(data){
            let modal = $('div.modal#updateModal');
            modal.find('input[name="service_provider_id"]').val(data.service_provider_id);
            modal.find('input[name="company_name"]').val(data.service_provider_name);
            modal.find('input[name="company_type"]').val(data.service_provider_type);
            modal.find('input[name="company_url"]').val(data.service_provider_url);
            modal.modal('show');
        },
        prepare_service: function(data){
            let modal = $('div.modal#serviceUpdateModal');
            modal.find('input[name="service_provider_id"]').val(data.service_provider_id);
            modal.find('input[name="service_id"]').val(data.service_id);
            modal.find('input[name="service_name"]').val(data.service_name);
            modal.find('input[name="service_category"]').val(data.service_category);
            modal.find('input[name="service_sub_category"]').val(data.service_sub_category);
            modal.modal('show');
        },
        prepare_contact: function(data){
            let modal = $('div.modal#contactUpdateModal');
            modal.find('input[name="service_provider_id"]').val(data.service_provider_id);
            modal.find('input[name="contact_id"]').val(data.contact_id);
            modal.find('input[name="first_name"]').val(data.first_name);
            modal.find('input[name="last_name"]').val(data.last_name);
            modal.find('input[name="middle_name"]').val(data.middle_name);
            modal.find('input[name="job_title"]').val(data.job_title);
            modal.find('input[name="job_function"]').val(data.job_function);
            modal.find('input[name="job_role"]').val(data.job_role);
            modal.modal('show');
        },
        prepare_email: function(data){
            let modal = $('div.modal#contactEmailAddressUpdateModal');
            modal.find('input[name="contact_id"]').val(data.contact_id);
            modal.find('input[name="email_id"]').val(data.email_id);
            modal.find('input[name="email_address"]').val(data.email);
            modal.modal('show');
        },
        prepare_phone: function(data){
            let modal = $('div.modal#contactPhoneNumberUpdateModal');
            modal.find('input[name="contact_id"]').val(data.contact_id);
            modal.find('input[name="phone_id"]').val(data.phone_id);
            modal.find('input[name="ctry_cd"]').val(data.ctry_code);
            modal.find('input[name="area_cd"]').val(data.area_code);
            modal.find('input[name="phone_no"]').val(data.phone_no);
            modal.find('input[name="ext"]').val(data.extension);
            modal.modal('show');
        },
        prepare_address: function(data){
            let modal = $('div.modal#contactAddressUpdateModal');
            modal.find('input[name="contact_id"]').val(data.contact_id);
            modal.find('input[name="address_id"]').val(data.address_id);
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
        if(['contactEmailAddressAddModal',
        'contactAddressAddModal',
        'contactPhoneNumberAddModal'].indexOf(this.id) > -1) {
            let contact_id = $(e.relatedTarget).closest('li.single-contact').data('id');
            $(this).find('form').find('input[name="contact_id"]').val(contact_id);
        }
    }).find('button.btn-primary').click(function(){
        let callback = this.id.replace('btn','callback');
        let modal = $(this).closest('div.modal');
        handler.submit_form(modal, callback);
    });

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

    let urlSuffixMap = {
        'service_provider': '',
        'service': '/service',
        'contact': '/contact',
        'address':'/contact-address',
        'email':'/contact-email',
        'phone':'/contact-phone',
    }
    $('body').on('click','button.edit', function(){
        
        let action_for = $(this).data('for');
        let id = null;
        
        if(['email', 'address', 'phone'].indexOf(action_for) > -1) {
            id = $(this).closest('div.row').data('id');
        } else {
            id = $(this).closest('tr,li').data('id');
        }

        $.get(`/service-providers/json/${id}${urlSuffixMap[action_for]}`, null, function(response){
            let prepare_function = 'prepare_'+action_for;
            if(response.success && !!handler[prepare_function]){
                handler[prepare_function](response.html);
            } else {
                console.log("Unable to process request. Seeking ",prepare_function);
            }
        })
    })

    $('div.modal#deleteConfirmationModal').on('show.bs.modal', function(e){
        let $el = $(e.relatedTarget).closest('tr, li');
        let service_provider_id = $el.data('id');
        let action_for = $(e.relatedTarget).data('for');
        let action = 'delete_'+action_for;
        let modal = $(this);
        modal.find('.alert.alert-danger').addClass('d-none');
        console.log(action);
        $(this).find('button.btn-primary').bind('click', function(){
            if(!!handler[action]){
                handler[action](modal, $el, service_provider_id);
                modal.modal('hide');
            }
        });
    }).on('hidden.bs.modal', function (e) {
        $(this).find('button.btn-primary').unbind();
    })
});