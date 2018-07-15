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
        submit_form: function(modal, callback) {
            var form = modal.find('form');
            var service_provider_id = form.find('input[name="service_provider_id"]').val();
            if (form[0].checkValidity() === false) {
                display_errors(form[0]);
            } else {
                make_call(
                    '/service-providers/ajax',
                    $.param(form.serializeArray()),
                    function(response){
                        if(!!handler[callback]){
                            handler[callback](response, service_provider_id);
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
        }
    }
    
    $('div.modal:not(#deletecConfirmationModal)').on('hidden.bs.modal', function (e) {
        let form = $(this).find('form')[0];
        form.reset();
        form.classList.remove('was-validated');
        $(this).find('.alert.alert-danger').addClass('d-none');
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
        'contact_address':'/contact-address',
        'contact_email':'/contact-email',
        'contact_phone':'/contact-phone',
    }
    $('body').on('click','button.edit', function(){
        
        let action_for = $(this).data('for');
        let id = $(this).closest('tr').data('id');

        $.get(`/service-providers/json/${id}${urlSuffixMap[action_for]}`, null, function(response){
            let prepare_function = 'prepare_'+action_for;
            if(response.success && !!handler[prepare_function]){
                handler[prepare_function](response.html);
            } else {
                console.log("Unable to process request. Seeking ",prepare_function);
            }
        })
    })

    $('div.modal#deletecConfirmationModal').on('show.bs.modal', function(e){
        let service_provider_id = $(e.relatedTarget).closest('tr').data('id');
        let action_for = $(e.relatedTarget).data('for');
        let action = 'delete_'+action_for;
        let modal = $(this);
        modal.find('.alert.alert-danger').addClass('d-none');
        $(this).find('button.btn-primary').bind('click', function(){
            if(!!handler[action]){
                handler[action](modal, $(e.relatedTarget).closest('tr'), service_provider_id);
                modal.modal('hide');
            }
        });
    }).on('hidden.bs.modal', function (e) {
        $(this).find('button.btn-primary').unbind();
    })
});