$(document).ready(function(){
    
    favoriteEntities = favoriteEntities || [];

    let clsFavorite = 'fa-heart';
    let clsNotFavorite = 'fa-heart-o';

    function toggleClass(el, from, to) {
        $(el).removeClass(from).addClass(to);
    }
    
    $('i.icon-favorite').click(function(){
        
        let id = $(this).data('id');
        let type = $(this).data('type');
        let ref = this;
        if($(ref).hasClass(clsFavorite)) {
            favorite('unmark', id, type, function(){
                toggleClass(ref, clsFavorite, clsNotFavorite);
            });
            
        } else {
            favorite('mark', id, type, function(){
                toggleClass(ref, clsNotFavorite, clsFavorite);
            });
        }
    });

    $(favoriteEntities).each(function(j,i) {
        toggleClass($(`i.icon-favorite.${clsNotFavorite}[data-id="${i.id}"][data-type="${i.type}"]`), clsNotFavorite, clsFavorite);
    });

    function favorite(action, reference_id, type, cb){
        let token = $('input[name="csrf_token"]').eq(0).val();
            make_call(
                '/my-account/ajax',
                $.param([{name:'type', value: type}, {name:'reference_id', value: reference_id}, {name: "action", value: `${action}_favorite`},{name:'csrf_token', value:token}]),
                function(response){
                    cb();
                }
            );
    }

    function make_call(endpoint, data, success) {
        $.post(
            endpoint,
            data,
            success
        ).fail(function(response){
            console.log(response);
        });
    }
});