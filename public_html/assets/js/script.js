(function($, _w){
  $(document).ready(function(){
    // Highlight the current active location in Main navigation
    $('div#mainNavigationBar a[href="'+_w.location.href+'"]').parent().addClass('active');
  });

  if($.fn.pwstrength){
    $('form#user_activation input#password').pwstrength();
  }

  $('li.tb-search-item a').click(function(){
    $('div#tb-search').fadeIn();
  });

  $('div.search-close').click(function(){
    $('div#tb-search').fadeOut();
  });
/*
  $('form.search-form').find('input.search-field').keydown(function(e){
    e.preventDefault();
    if(e.which == 13) { //enter pressed
      $(this).closest('form').submit();
      return true;
    }
    return false;
  })*/
})(jQuery, window);
