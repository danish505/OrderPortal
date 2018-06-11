$(document).ready(function(){
    var addModal = $('#contactAddModal');
    addModal.on('hidden.bs.modal', function (e) {
        addModal.find('form')[0].reset();
    });

    addModal.find('button#btn_add_contact').click(function(event){
        var form = addModal.find('form')[0];
        if (form.checkValidity() === false) {
            form.classList.add('was-validated');
        } else {
            $.post(
                '/my-account/ajaxs',
                $.param(addModal.find('form').serializeArray()),
                function(response){
                    console.log(response);
                    addModal.modal('hide');
                }
            ).fail(function(response){
                addModal.find('.alert.d-none').removeClass('d-none');
            });
            
        }
        
    })
});