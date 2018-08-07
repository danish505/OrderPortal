$(document).ready(function(){
    var prefix = 'service_';
    var handler = {
        handle: function(response, _cb){
            if(response.success){
                _cb(response);
            } else {
                console.log(response.message);
            }
        },
        callback_service_add: function(response, service_id) {
            handler.handle(response, function(r){
                let list = $('table > tbody');
                list.append(r.html);
                list.find('tr.not-found').addClass('d-none');
            });
        },
        callback_service_update: function(response, service_id) {
            handler.handle(response, function(r){
                var id = $(r.html).data('id');
                let div = $('tr#'+prefix+service_id);
                div.replaceWith(r.html);
            });
        },
        callback_delete_service: function(modal, response, $el){
            if(response.success){
                $parent = $el.parent();
                modal.find('div.alert-danger').addClass('d-none');
                modal.modal('hide');
                $el.remove();
                if($parent.find('tr:not(.not-found)').length == 0){
                    $parent.find('tr.not-found').removeClass('d-none');
                }
            }else{
                modal.find('div.alert-danger').removeClass('d-none');
            }
        },
        submit_form: function(modal, callback) {
            var form = modal.find('form');
            var service_id = form.find('input[name="service_id"]').val();
            if (form[0].checkValidity() === false) {
                display_errors(form[0]);
            } else {
                make_call(
                    '/services/ajax',
                    $.param(form.serializeArray()),
                    function(response){
                        if(!!handler[callback]){
                            handler[callback](response, service_id);
                        }
                        callback_after_success(response, modal);
                    },
                    function(response){
                        callback_fail(response, modal);
                    }
                )
            }
        },
        prepare_service: function(data){
            let modal = $('div.modal#updateModal');
            modal.find('input[name="service_id"]').val(data.service_id);
            modal.find('input[name="service_name"]').val(data.service_name);
            modal.find('input[name="service_category"]').val(data.service_category);
            modal.find('input[name="service_sub_category"]').val(data.service_sub_category);
            modal.modal('show');
        },
        delete_service: function(modal, $el, id){
            let token = $('input[name="csrf_token"]').eq(0).val();
            make_call(
                '/services/ajax',
                $.param([{name:'service_id', value: id}, {name: "action", value: "service_delete"},{name:'csrf_token', value:token}]),
                function(response){
                    handler['callback_delete_service'](modal, response, $el);
                },
                function(response){
                    callback_delete_fail(response, modal);
                }
            );
        }
    }
    
    $('div.modal:not(#deleteConfirmationModal)').on('hidden.bs.modal', function (e) {
        let form = $(this).find('form')[0];
        form.reset();
        form.classList.remove('was-validated');
        $(this).find('.alert.alert-danger').addClass('d-none');
    }).find('button.btn-primary').click(function(){
        let callback = this.id.replace('btn','callback');
        let modal = $(this).closest('div.modal');
        handler.submit_form(modal, callback);
    });

    $('div.modal#deleteConfirmationModal').on('show.bs.modal', function(e){
        let id = $(e.relatedTarget).closest('tr').data('id');
        let action_for = $(e.relatedTarget).data('for');
        let action = 'delete_'+action_for;
        let modal = $(this);
        modal.find('.alert.alert-danger').addClass('d-none');
        $(this).find('button.btn-primary').bind('click', function(){
            if(!!handler[action]){
                handler[action](modal, $(e.relatedTarget).closest('tr'), id);
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
        let id = $(this).closest('tr').data('id');

        $.get(`/services/json/${id}`, null, function(response){
            let prepare_function = 'prepare_'+action_for;
            if(response.success && !!handler[prepare_function]){
                handler[prepare_function](response.html);
            } else {
                console.log("Unable to process request");
            }
        })
    })
});