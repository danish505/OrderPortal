$(document).ready(function(){
    var prefix = 'contactDetail';
    var handler = {
        handle: function(response, _cb){
            if(response.success){
                _cb(response);
            } else {
                console.log(response.message);
            }
        },
        callback_contact_add: function(response, contact_id) {
            handler.handle(response, function(r){
                let list = $('ul.patient-contacts-list');
                list.append(r.html);
                list.find('li.not-found').addClass('d-none');
            });
        },
        callback_contact_email_address_add: function(response, contact_id) {
            handler.handle(response, function(r){
                let list = $('div.collapse#'+prefix+contact_id).find('div.emails-list');
                list.append(r.html);
                list.find('div.not-found').addClass('d-none');
            });
        },
        callback_contact_address_add: function(response, contact_id) {
            handler.handle(response, function(r){
                let list = $('div.collapse#'+prefix+contact_id).find('div.address-list');
                list.append(r.html);
                list.find('div.not-found').addClass('d-none');
            });
        },
        callback_contact_phone_number_add: function(response, contact_id) {
            handler.handle(response, function(r){
                let list = $('div.collapse#'+prefix+contact_id).find('div.phones-list');
                list.append(r.html);
                list.find('div.not-found').addClass('d-none');
            });
        },
        callback_delete_email: function($el, contact_id){
            handler.handle(response, function(r){

            });
        },
        callback_delete_address: function($el, contact_id){
            handler.handle(response, function(r){

            });
        },
        callback_delete_phone: function($el, contact_id){
            handler.handle(response, function(r){

            });
        },
        callback_delete_contact: function($el, contact_id){
            handler.handle(response, function(r){

            });
        },
        delete_email: function($el, contact_id) {
            let $parent = $el.parent();
            $el.remove();
            if($parent.find('div.single-email').length == 0){
                $parent.find('div.not-found').removeClass('d-none');
            }
        },
        delete_address: function($el, contact_id) {
            let $parent = $el.parent();
            $el.remove();
            if($parent.find('div.single-address').length == 0){
                $parent.find('div.not-found').removeClass('d-none');
            }
        },
        delete_phone: function($el, contact_id) {
            let $parent = $el.parent();
            $el.remove();
            if($parent.find('div.single-phone').length == 0){
                $parent.find('div.not-found').removeClass('d-none');
            }
        },
        delete_contact: function($el, contact_id){
            let $parent = $el.parent();
            $el.remove();
            if($parent.find('li.single-contact').length == 0){
                $parent.find('li.not-found').removeClass('d-none');
            }
        },
        submit_form: function(modal, callback) {
            var form = modal.find('form');
            var contact_id = form.find('input[name="contact_id"]').val();
            if (form[0].checkValidity() === false) {
                display_errors(form[0]);
            } else {
                make_call(
                    '/my-account/ajax',
                    $.param(form.serializeArray()),
                    function(response){
                        if(!!handler[callback]){
                            handler[callback](response, contact_id);
                        }
                        callback_after_success(response, modal);
                    },
                    function(response){
                        callback_fail(response, modal);
                    }
                )
            }
        }
    }
    
    $('div.modal:not(#deletecConfirmationModal)').on('hidden.bs.modal', function (e) {
        let form = $(this).find('form')[0];
        form.reset();
        form.classList.remove('was-validated');
        $(this).find('.alert.alert-danger').addClass('d-none');
    }).on('show.bs.modal', function(e){
        let $collapse = $(e.relatedTarget).closest('div.collapse');
        if(!!$collapse && $collapse.length > 0){
            let contact_id = $collapse[0].id.replace(prefix,'');
            $(this).find('form').find('input[name="contact_id"]').val(contact_id);
        }
    }).find('button.btn-primary').click(function(){
        let callback = this.id.replace('btn','callback');
        let modal = $(this).closest('div.modal');
        handler.submit_form(modal, callback);
    });

    $('div.modal#deletecConfirmationModal').on('show.bs.modal', function(e){
        let contact_id = $(e.relatedTarget).closest('li.list-group-item.single-contact').find('div.collapse')[0].id.replace(prefix,'');
        let action_for = $(e.relatedTarget).data('for');
        let action = 'delete_'+action_for;
        let modal = $(this);
        $(this).find('button.btn-primary').bind('click', function(){
            if(!!handler[action]){
                handler[action]($(e.relatedTarget).closest('.single-'+action_for), contact_id);
                modal.modal('hide');
            }
        });
    }).on('hidden.bs.modal', function (e) {
        $(this).find('button.btn-primary').unbind();
    })

    function display_errors(form) {
        form.classList.add('was-validated');
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
});