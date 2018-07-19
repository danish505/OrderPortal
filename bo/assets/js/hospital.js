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
        callback_delete_hospital: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('li.single-hospital').length == 0){
                    $parent.find('li.not-found').removeClass('d-none');
                }
            });
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
        callback_delete_department: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('li:not(.not-found)').length == 0){
                    $parent.find('li.not-found').removeClass('d-none');
                }
            });
        },
        callback_delete_service: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('div.single-service:not(.not-found)').length == 0){
                    $parent.find('div.not-found').removeClass('d-none');
                }
            });
        },
        callback_delete_contact: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.find('div.single-contact:not(.not-found)').length == 0){
                    $parent.find('div.not-found').removeClass('d-none');
                }
            });
        },
        callback_delete_affiliate: function(response, $el){
            handler.handle(response, function(r){
                let $parent = $el.parent();
                $el.remove();
                if($parent.children('div:not(.not-found)').length == 0){
                    $parent.children('div.not-found').removeClass('d-none');
                }
            });
        },
        delete_contact: function(modal, $el) {
            let token = $('input[name="csrf_token"]').eq(0).val();
            let contact_id = $el.data('id');
            make_call(
                '/hospitals/ajax',
                $.param([{name:'contact_id', value: contact_id},{name: "action", value: "hospital_contact_detach"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_contact'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        delete_service: function(modal, $el) {
            let token = $('input[name="csrf_token"]').eq(0).val();
            let service_id = $el.data('id');
            make_call(
                '/hospitals/ajax',
                $.param([{name:'service_id', value: service_id},{name: "action", value: "hospital_service_detach"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_service'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        delete_department: function(modal, $el, hospital_id) {
            let token = $('input[name="csrf_token"]').eq(0).val();
            let department_id = $el.data('id');
            make_call(
                '/hospitals/ajax',
                $.param([{name:'hospital_dept_id', value: department_id},{name:'hospital_id', value: hospital_id}, {name: "action", value: "hospital_department_detach"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_department'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        delete_affiliate: function(modal, $el, hospital_id) {
            let token = $('input[name="csrf_token"]').eq(0).val();
            let affiliate_id = $el.data('id');
            make_call(
                '/hospitals/ajax',
                $.param([{name:'affiliate_hospital_id', value: affiliate_id},{name:'hospital_id', value: hospital_id}, {name: "action", value: "hospital_affiliate_detach"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_affiliate'](response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        },
        callback_hospital_department_attach: function(response, hospital_id){
            let list = $(`li#row-hospital-${hospital_id} ul.departments-list`);
            list.find('li.not-found').addClass('d-none').before(response.html);
        },
        callback_hospital_contact_attach: function(response, hospital_id, department_id){
            let list = $(`li#row-hospital-${hospital_id} li#row-department-${department_id} div.contacts-list`);
            list.find('div.not-found').addClass('d-none').before(response.html);
        },
        callback_hospital_service_attach: function(response, hospital_id, department_id){
            let list = $(`li#row-hospital-${hospital_id} li#row-department-${department_id} div.services-list`);
            list.find('div.not-found').addClass('d-none').before(response.html);
        },
        callback_hospital_affiliate_attach: function(response, hospital_id){
            let list = $(`li#row-hospital-${hospital_id} div.affiliates-list`);
            list.find('div.not-found').addClass('d-none').before(response.html);
        },
        submit_form: function(modal, callback) {
            var form = modal.find('form');
            var hospital_id = form.find('input[name="hospital_id"]').val();
            var department_id = form.find('input[name="department_id"]').val();
            if (form[0].checkValidity() === false) {
                display_errors(form[0]);
            } else {
                make_call(
                    '/hospitals/ajax',
                    $.param(form.serializeArray()),
                    function(response){
                        if(!!handler[callback]){
                            handler[callback](response, hospital_id, department_id);
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
        prepare_services: function(data, hospital_id, department_id) {
            let modal = $('div.modal#serviceAttachModal');
            let list = $(`li#row-hospital-${hospital_id} li#row-department-${department_id} div.services-list > div`);
            modal.find('select').html(handler.make_dropdown(data, list, 'service-id'));
            modal.find('input[name="hospital_id"]').val(hospital_id);
            modal.find('input[name="department_id"]').val(department_id);
            modal.modal('show');
        },
        prepare_contacts: function(data, hospital_id, department_id) {
            let modal = $('div.modal#contactAttachModal');
            let list = $(`li#row-hospital-${hospital_id} li#row-department-${department_id} div.contacts-list > div`);
            modal.find('select').html(handler.make_dropdown(data, list, 'contact-id'));
            modal.find('input[name="hospital_id"]').val(hospital_id);
            modal.find('input[name="department_id"]').val(department_id);
            modal.modal('show');
        },
        prepare_departments: function(data, hospital_id) {
            let modal = $('div.modal#departmentAttachModal');
            let list = $(`li#row-hospital-${hospital_id} ul.departments-list li`);
            modal.find('select').html(handler.make_dropdown(data, list));
            modal.find('input[name="hospital_id"]').val(hospital_id);
            modal.modal('show');
        },
        prepare_affiliates: function(data, hospital_id) {
            let modal = $('div.modal#affiliateAttachModal');
            let list = $(`li#row-hospital-${hospital_id} div.affiliates-list > div`);
            modal.find('select').html(handler.make_dropdown(data, list));
            modal.find('input[name="hospital_id"]').val(hospital_id);
            modal.modal('show');
        },
        make_dropdown: function(data, list, identifier = 'id') {
            let html = '<option>-- Select --</option>';
            for(i in data){
                if(list.filter(`[data-${identifier}="${data[i].id}"]`).length > 0) continue;
                html += `<option value="${data[i].id}">${data[i].label}</option>`;
            }
            return html;
        }
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
        let id = $(this).closest('.single-hospital').data('id');
        let did = $(this).closest('.single-department').data('id');

        $.get(`/hospitals/json/${action_for}/${id}`, null, function(response){
            let prepare_function = 'prepare_'+action_for;
            console.log(prepare_function);
            if(response.success && !!handler[prepare_function]){
                handler[prepare_function](response.html, id, did);
            } else {
                console.log("Unable to process request");
            }
        })
    })
});