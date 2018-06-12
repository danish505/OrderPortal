$(document).ready(function(){

    var handler = {
        callback_contact_add: function(response) {
            if(response.success){
                $('ul.patient-contacts-list').append(response.html);
            } else {
                console.log(response.message);
            }
        }
    }
    $('div.modal').on('hidden.bs.modal', function (e) {
        let form = $(this).find('form')[0];
        form.reset();
        form.classList.remove('was-validated');
        $(this).find('.alert.alert-danger').addClass('d-none');
    }).find('button.btn-primary').click(function(){
        let callback = this.id.replace('btn','callback');
        let modal = $(this).closest('div.modal');
        make_call(modal, callback);
    });

    function display_errors(form) {
        form.classList.add('was-validated');
    }

    function callback_fail(response, modal) {
            modal.find('.alert.alert-danger.d-none').removeClass('d-none');
    }

    function callback_after_success(response, modal) {
        modal.modal('hide');
    }

    function make_call(modal, callback) {
        var form = modal.find('form');
        if (form[0].checkValidity() === false) {
            display_errors(form[0]);
        } else {
            $.post(
                '/my-account/ajax',
                $.param(form.serializeArray()),
                function(response){
                    if(!!handler[callback]){
                        handler[callback](response);
                    }
                    callback_after_success(response, modal);
                }
            ).fail(function(response){
                callback_fail(response, modal);
            });
        }
    }
});